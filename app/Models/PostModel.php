<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostModel extends Model
{
    use HasFactory;

    public function posts($id)
    {
        return DB::table('posts as p')
            ->join('users as u', 'p.user_id', '=', 'u.user_id')
            ->where('p.user_id', $id)
            ->select('p.post_id', 'p.user_id', 'u.username', 'p.content', 'u.profile_pic', 'u.from', 'p.created', 'p.image')
            ->get();

    }

    public function comments($post_id)
    {
        return DB::table('comments as c')
            ->join('users as u', 'c.user_id', '=', 'u.user_id')
            ->where('c.post_id', $post_id)
            ->orderBy('time')
            ->select('c.post_id', 'c.user_id', 'c.content', 'c.time', 'u.username', 'u.profile_pic')
            ->get();
    }

    public function likes($post_id)
    {
        return DB::table('likes')
            ->where('post_id', $post_id)
            ->get();
    }

    public function insertGetComments($data)
    {
        $id = $data['post_id'];
        DB::table('comments')->insert($data);
        return DB::table('users as u')
            ->join('comments as c', 'c.user_id', '=', 'u.user_id')
            ->where('c.post_id', $id)
            ->get();
    }

    public function insertGetLikes($data)
    {
        $pid = $data['post_id'];
        $uid = $data['user_id'];

        $like = DB::table('likes')
            ->where('post_id', $pid)
            ->where('user_id', $uid)
            ->first();

        if ($like != null) {
            DB::table('likes')
                ->where('post_id', $pid)
                ->where('user_id', $uid)
                ->delete();
        } else {
            DB::table('likes')->insert($data);
        }

        return DB::table('likes')
            ->where('post_id', $pid)
            ->get();
    }

    public function insert($post)
    {
        DB::table('posts')->insert($post);
    }

    public function deletePost($id)
    {
        DB::table('posts')->where('post_id', $id)->delete();
    }

    public function novi($id)
    {
        return DB::table('comments')
            ->where('post_id', $id)
            ->get();
    }
}
