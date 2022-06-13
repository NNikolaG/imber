<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfileRequest;
use App\Mail\ContactAdministrator;
use App\Models\AuthModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AuthController extends BaseController
{
    private $authModel;

    public function index(Request $request)
    {
        return view('common.signup');
    }

    public function signin(Request $request)
    {
        try {
            $email = $request->input('email');
            $password = md5($request->input('password'));

            $result = DB::table('users')
                ->where('email', '=', $email)
                ->where('password', '=', $password)
                ->first();

            if ($result) {
                if ($result->active == 0) {
                    $request->session()->put("user", $result);
                    $username = str_replace(' ', '', $result->username);
                    Log::info('Login: user-logged-in', ['username' => $username, 'email' => $result->email]);
                    return redirect()->route('home.index');
                }
                return redirect()->back();
            }
            return redirect()->back();

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $this->data['error'] = $e->getMessage();
        }
    }

    public function signout(Request $request)
    {
        $user = $request->session()->get('user');
        $username = str_replace(' ', '', $user->username);
        Log::info('Logout: user-logged-out', ['username' => $username, 'email' => $user->email]);
        $request->session()->remove('user');
        return redirect()->route('welcome');
    }

    public function signup(CreateProfileRequest $request)
    {
        try {
            $pass = md5($request['password']);
            $passx = md5($request['confPassword']);

            if ($pass == $passx) {
                $user = $request->except('_token', 'confPassword');
                $user['password'] = $pass;
                $this->authModel = new AuthModel();

                $this->authModel->signup($user);
                $username = str_replace(' ', '', $user['username']);
                Log::info('Register: new-user-registered', ['username' => $username, 'email' => $user['email']]);
                return redirect()->route('home.index');
            } else {
                return redirect()->route('welcome');
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $this->data['error'] = $e->getMessage();
            return redirect()->route('welcome');
        }
    }

    public function contact(Request $request)
    {
        $data = $request->except(['_token']);
        $email = $data['email'];
        $msg = $data['message'];

        Mail::to('nikola.gutic@yandex.com')->send(new ContactAdministrator($msg, $email));
        return redirect()->back();
    }

    public function error()
    {
        return view('client.error', $this->data);
    }
}
