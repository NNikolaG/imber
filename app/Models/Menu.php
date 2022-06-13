<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    use HasFactory;

    public function get(){
        return DB::table('navlinks')
            ->select('name', 'route', 'icon', 'alttag', 'navlink_id')
            ->get();
    }
}
