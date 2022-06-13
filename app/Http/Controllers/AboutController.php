<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        return view('client.about', $this->data);
    }
}
