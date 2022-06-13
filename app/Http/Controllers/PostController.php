<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Models\Menu;
use App\Models\PostModel;
use App\Models\ProfilesModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends BaseController
{
    private $userModel;
    private $postModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->userModel = new ProfilesModel();

        parent::__construct();

    }

    public function index(Request $request)
    {

        $this->id = $request->session()->get('user')->user_id;

        // id of current user and ids of user that current user is following
        $followed = $this->userModel->getFollowed($this->id);
        array_push($followed, $this->id);

        $collection = [];
        $allPosts = [];
        // getting all posts for ids + all comments and likes for every post
        foreach ($followed as $key => $value) {
            $collection[$key] = $this->postModel->posts($value);
            foreach ($collection as $item) {
                foreach ($item as $value) {
                    array_push($allPosts, $value);
                    $value->comments = $this->postModel->comments($value->post_id);
                    $value->likes = $this->postModel->likes($value->post_id);
                }
            }
        }

        // filtering arrays to unique
        $allPostsFiltered = array_unique($allPosts, SORT_REGULAR);

        //sorting by last created
        usort($allPostsFiltered, function ($a, $b) {
            return strtotime($b->created) - strtotime($a->created);
        });

        $this->data['post'] = $allPostsFiltered;
        $this->data['topProfiles'] = $this->userModel->topProfiles($this->id);
        $this->data['user'] = $this->userModel->user($request->session()->get('user')->username);
        $this->data['followings'] = $this->userModel->followings($this->id);
        return view('client.news-feed', $this->data);
    }

    public function create()
    {
//        return view('client.partials.newsfeed-partials.popup-post');
    }


    public function store(PostCreateRequest $request)
    {
        try {
            $post = $request->except(['_token']);
            if ($request->has('image')) {
                $image = $request->file('image');
                $unique = uniqid() . '_' . time() . '.' . $request->file('image')->extension();

//                $image->storeAs('public/gallery/', $unique);
                $image->move(public_path('/storage/gallery'), $unique);
                $post['image'] = $unique;
            }
            $this->postModel->insert($post);

            return response()->redirectToRoute('home.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->redirectToRoute('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->postModel->deletePost($id);
            return redirect()->back();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            dd($e->getMessage());
            return response()->redirectToRoute('error');
        }
    }
}
