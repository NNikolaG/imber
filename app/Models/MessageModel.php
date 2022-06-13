<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MessageModel extends Model
{
    use HasFactory;

    public function sendMsg($data)
    {
        DB::table('messages')->insert(['sender_id' => $data['idt'], 'receiver_id' => $data['idx'], 'content' => $data['content']]);
    }

    public function getChats($id)
    {
        $niz = [];
        $idx = DB::table('followings')
            ->where('follower_id', $id)
            ->select('followed_id')
            ->distinct()
            ->get();

        $idy = DB::table('followings')
            ->where('followed_id', $id)
            ->select('follower_id')
            ->distinct()
            ->get();
        foreach ($idx as $id) {
            foreach ($idy as $x) {
                if ($x->follower_id == $id->followed_id) {
                    array_push($niz, $id->followed_id);
                }
            }
        }

        $users = [];

        foreach ($niz as $e) {
            $result = DB::table('users')
                ->where('user_id', $e)
                ->select('username', 'profile_pic', 'user_id')
                ->first();
            array_push($users, $result);
        }
        return $users;
    }

    public function fetchMessages($data)
    {

        return DB::table('messages')
            ->where(function ($query) use ($data) {
                $query->where('receiver_id', '=', $data['idx'])
                    ->orWhere('sender_id', '=', $data['idx']);
            })
            ->where(function ($query) use ($data) {
                $query->where('receiver_id', '=', $data['idt'])
                    ->orWhere('sender_id', '=', $data['idt']);
            })
            ->get();
    }
}
