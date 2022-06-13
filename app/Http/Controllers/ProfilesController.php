<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfileRequest;
use App\Models\PostModel;
use App\Models\ProfilesModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Nette\Utils\Image;

class ProfilesController extends BaseController
{
    private $profilesModel;
    private $postModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->profilesModel = new ProfilesModel();

        parent::__construct();
    }

    public function index(Request $request)
    {
        $id = $request->session()->get('user')->user_id;

        $this->data['profiles'] = $this->profilesModel->getProfiles($id);

        foreach ($this->data['profiles'] as $profile) {
            $profile->followers = $this->profilesModel->getFollowers($profile->user_id);
        }
        return view('client.profiles', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(CreateProfileRequest $request)
    {

    }

    public function show($username)
    {
        $id = $this->profilesModel->getID($username)->user_id;

        $this->data['post'] = $this->postModel->posts($id);
        foreach ($this->data['post'] as $post) {
            $post->likes = $this->postModel->likes($post->post_id);
            $post->comments = $this->postModel->comments($post->post_id);
        }
        $this->data['user'] = $this->profilesModel->user($username);
        $this->data['followings'] = $this->profilesModel->followings($id);
        $this->data['followers'] = $this->profilesModel->getFollowers($id);

        return view('client.profile', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        try {
            $user = $request->except(['_token', '_method']);
            if ($request->has('coverImage')) {
                $image = $request->file('coverImage');
                $unique = uniqid() . '_' . time() . '.' . $request->file('coverImage')->extension();

                $image->storeAs('public/covers/', $unique);
                $user['coverImage'] = $unique;
                $user['user_id'] = $id;

                $this->profilesModel->updateCover($user);
            }

            if ($request->has('profile_pic')) {

                $image = $request->file('profile_pic');
                $unique = uniqid() . '_' . time() . '.' . $request->file('profile_pic')->extension();


                $image->storeAs('public/profileImages/', $unique);
                $user['profile_pic'] = $unique;
                $user['user_id'] = $id;

                $this->profilesModel->updateProfilePic($user);
            }

            if ($request->has('info')) {
                $this->profilesModel->infoUpdate($user, $id);
            }
            if ($request->has('bioX')) {
                $this->profilesModel->bioUpdate($user, $id);
            }

            return redirect()->back();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->redirectToRoute('error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function fetchData(Request $request)
    {
        $id = $request->session()->get('user')->user_id;

        if ($request->ajax()) {
            if($request['key']){
                $this->data['profiles'] = $this->profilesModel->getProfiles($id, $request['key']);

                foreach ($this->data['profiles'] as $profile) {
                    $profile->followers = $this->profilesModel->getFollowers($profile->user_id);
                }
            }
            else{
                $this->data['profiles'] = $this->profilesModel->getProfiles($id);
                foreach ($this->data['profiles'] as $profile) {
                    $profile->followers = $this->profilesModel->getFollowers($profile->user_id);
                }
            }
            return view('client.partials.profiles-partials.for-profiles', $this->data)->render();
        }
    }
}
