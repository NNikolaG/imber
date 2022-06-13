<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProfilesModel extends Model
{
    use HasFactory;

    public function user($username)
    {
        return DB::table('users')
            ->where('username', $username)
            ->first();
    }

    public function getID($username)
    {
        return DB::table('users')
            ->where('username', $username)
            ->select('user_id')
            ->first();
    }

    public function followings($id)
    {
        $following = DB::table('users as u')
            ->join('followings as f', 'f.follower_id', '=', 'u.user_id')
            ->where('f.follower_id', '=', $id)
            ->count('f.follower_id');

        $followers = DB::table('users as u')
            ->join('followings as f', 'f.follower_id', '=', 'u.user_id')
            ->where('f.followed_id', '=', $id)
            ->count('f.follower_id');

        //return number of following and followers
        return ['following' => $following, 'followers' => $followers];
    }

    public function getProfiles($id, $key = '')
    {
        if ($key != '') {
            return DB::table('users')
                ->where('user_id', '!=', $id)
                ->where('username', 'LIKE', '%' . $key . '%')
                ->paginate(4);
        }
        return DB::table('users')
            ->where('user_id', '!=', $id)
            ->paginate(4);
    }

    public function getFollowers($id)
    {
        return DB::table('followings')
            ->where('followed_id', $id)
            ->get();
    }

    public function getFollowed($id)
    {
        $result = DB::table('followings')
            ->where('follower_id', $id)
            ->select('followed_id')
            ->distinct()
            ->get();
        $array = [];
        foreach ($result as $e) {
            array_push($array, $e->followed_id);
        }
        return $array;
    }

    public function topProfiles($id)
    {
        return DB::table('users as u')
            ->join('followings as f', 'f.followed_id', '=', 'u.user_id')
            ->where('u.user_id', '!=', $id)
            ->select('u.username', 'u.profile_pic', DB::raw('count("f.followed_id") as num'), 'from')
            ->groupBy('u.username', 'u.profile_pic', 'from')
            ->orderByDesc('num')
            ->get();
    }

    public function updateCover($user)
    {
        if ($user['coverImage']) {
            DB::table('users')->where('user_id', $user['user_id'])->update(['background' => $user['coverImage']]);
        } else {
            return false;
        }
    }

    public function updateProfilePic($user)
    {
        if ($user['profile_pic']) {
            DB::table('users')->where('user_id', $user['user_id'])->update(['profile_pic' => $user['profile_pic']]);
        } else {
            return false;
        }
    }

    public function insertGetFollow($data)
    {
        $ut = $data['follower_id'];
        $ux = $data['followed_id'];

        $exist = DB::table('followings')
            ->where('follower_id', $ut)
            ->where('followed_id', $ux)
            ->first();

        if ($exist != null) {
            DB::table('followings')
                ->where('follower_id', $ut)
                ->where('followed_id', $ux)
                ->delete();
            return 'Follow';
        } else {
            DB::table('followings')->insert($data);
            return 'Following';
        }
    }

    public function checkAndChangePassword($data)
    {
        $old = $data['old-password'];
        $old = md5($old);
        $new = $data['new-password'];
        $new = md5($new);

        $result = DB::table('users')
            ->where('user_id', $data['id'])
            ->first();

        if ($result) {
            return DB::table('users')
                ->where('password', $old)
                ->update(['password' => $new]);
        }
        return false;
    }

    public function infoUpdate($user, $id)
    {
        DB::table('users')
            ->where('user_id', $id)
            ->update(['work' => $user['work'], 'mobile_number' => $user['mobile_number'], 'from' => $user['from']]);
    }

    public function bioUpdate($user, $id)
    {
        DB::table('users')
            ->where('user_id', $id)
            ->update(['bio' => $user['bio']]);
    }

    public function deactivate($enc)
    {
        return DB::table('users')
            ->where('password', $enc)
            ->update(['active' => 1]);
    }

    public function displayAccounts($id)
    {
        return DB::table('users as u')
            ->join('roles as r', 'u.role_id', '=', 'r.role_id')
            ->where('user_id', '!=', $id)
            ->get();
    }

    public function updateRole($role, $id)
    {
        if ($role == 1) {
            DB::table('users')
                ->where('user_id', $id)
                ->update(['role_id' => 2]);
        } else {
            DB::table('users')
                ->where('user_id', $id)
                ->update(['role_id' => 1]);
        }
    }

    public function updateStatus($status, $id)
    {
        if ($status == 1) {
            DB::table('users')
                ->where('user_id', $id)
                ->update(['active' => 0]);
        } else {
            DB::table('users')
                ->where('user_id', $id)
                ->update(['active' => 1]);
        }
    }
}
