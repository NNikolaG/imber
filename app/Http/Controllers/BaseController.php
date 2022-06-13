<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $data;
    private $menuModel;

    public function __construct(){

        $this->menuModel = new Menu();
        $this->data['menu'] = $this->menuModel->get();
    }

}
