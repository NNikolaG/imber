<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Models\ProfilesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Psy\Util\Json;

class SettingsController extends BaseController
{
    private $profileModel;

    public function __construct()
    {
        $this->profileModel = new ProfilesModel();
        parent::__construct();
    }

    public function index(Request $request)
    {
        $this->data['user'] = $this->profileModel->user(session()->get('user')->username);
        return view('client.account-seetings', $this->data);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $data = $request->except(['_token']);
        if ($data['new-password'] == $data['repeat-password']) {
            $result = $this->profileModel->checkAndChangePassword($data);
            if ($result) {
                return redirect()->route('home.index');
            }
        }
    }

    public function deactivate(Request $request, $username)
    {
        $data = $request->except(['_token']);

        $user = $this->profileModel->user($username);
        $enc = md5($data['password']);

        if ($user->password == $enc) {
            $result = $this->profileModel->deactivate($enc);

            if ($result) {
                $user = $request->session()->get('user');
                Log::info('Deactivated: user-deactivated-account', ['username' => $user->username, 'email' => $user->email]);
                $request->session()->remove('user');
                return redirect()->route('welcome');
            }
            return redirect()->route('settings', ['username' => $username]);
        }
        return redirect()->route('settings', ['username' => $username]);
    }
}
