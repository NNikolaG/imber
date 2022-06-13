<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\ProfilesModel;
use Illuminate\Http\Request;

class AdminController extends BaseController
{
    private $profileModel;
    private $adminModel;

    public function __construct()
    {
        parent::__construct();
        $this->profileModel = new ProfilesModel();
        $this->adminModel = new AdminModel();
    }

    public function index(Request $request)
    {
        $id = $request->session()->get('user')->user_id;

        $this->data['accounts'] = $this->profileModel->displayAccounts($id);
        return view('admin.partials.account-control', $this->data);
    }

    public function roleUpdate(Request $request, $id)
    {
        $data = $request->all();
        $role = $data['role_id'];
        $this->profileModel->updateRole($role, $id);
        return redirect()->back();
    }

    public function status(Request $request, $id)
    {
        $data = $request->all();
        $status = $data['status'];

        $this->profileModel->updateStatus($status, $id);
        return redirect()->back();
    }

    public function roleEdit()
    {
        $this->data['roles'] = $this->adminModel->getRoles();
        return view('admin.partials.role-edit', $this->data);
    }

    public function createRole(Request $request)
    {
        $data = $request->except(['_token']);
        $this->adminModel->createRole($data);

        return redirect()->back();
    }

    public function deleteRole(Request $request)
    {
        $id = $request->except(['_token']);
        $this->adminModel->deleteRole($id);

        return redirect()->back();
    }

    public function updateRole(Request $request)
    {
        $data = $request->all();
        $this->adminModel->updateRole($data['role_id'], $data['role_name']);
        return redirect()->back();
    }

    public function navEdit()
    {
        return view('admin.partials.nav-edit', $this->data);
    }

    public function createNav(Request $request)
    {
        $data = $request->except(['_token']);
        $this->adminModel->createNav($data);

        return redirect()->back();
    }

    public function deleteNav(Request $request)
    {
        $id = $request->except(['_token']);
        $this->adminModel->deleteNav($id);

        return redirect()->back();
    }

    public function updateNav(Request $request)
    {
        $data = $request->all();

        $id = $data['navlink_id'];
        $name = $data['name'];
        $alt = $data['alttag'];
        $route = $data['route'];

        $this->adminModel->updateNav($id, $name, $route, $alt);
        return redirect()->back();
    }

    public function logs()
    {
        $logs = $this->adminModel->getDataFromLaravelLog();

        $this->data['logs'] = $this->adminModel->paginate($logs);

        return view('admin.partials.log-view', $this->data);
    }

}
