<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OsnovniController extends Controller
{
    public function index(){
        return view('common.signup');
    }
}
