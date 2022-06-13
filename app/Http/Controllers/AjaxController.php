<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\AjaxModel;
use App\Models\PostModel;
use App\Models\ProfilesModel;
use Illuminate\Http\Request;
use Psy\Util\Json;
use function Symfony\Component\Translation\t;

class AjaxController extends BaseController
{
    private $postModel;
    private $profileModel;
    private $adminModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
        $this->profileModel = new ProfilesModel();
        $this->adminModel = new AdminModel();

        parent::__construct();
    }

    public function comments(Request $request)
    {
        $data = $request->except(['_token']);
        if ($data['content'] != '') {
            $result = $this->postModel->insertGetComments($data);
            foreach ($result as $e) {
                $e->elapsed = time_elapsed_string($e->time);
            }
            return Json::encode($result);
        }
    }

    public function likes(Request $request)
    {
        $data = $request->except(['_token']);

        $result = $this->postModel->insertGetLikes($data);
        return Json::encode($result);
    }

    public function follow(Request $request)
    {
        $data = $request->except(['_token']);

        $result = $this->profileModel->insertGetFollow($data);

        return Json::encode($result);
    }

    public function returnRole(Request $request)
    {
        $data = $request->all();
        $role = $data['role_id'];
        $result = $this->adminModel->returnRole($role);

        return Json::encode($result);
    }

    public function returnNav(Request $request)
    {
        $data = $request->all();
        $nav = $data['navlink_id'];
        $result = $this->adminModel->returnNav($nav);

        return Json::encode($result);
    }

    public function fetchLogs(Request $request)
    {
        $data = $request->all();
        $page = $data['page'];
        $date = $data['date'];

        $logs = $this->adminModel->getDataFromLaravelLog($date);

        $this->data['logs'] = $this->adminModel->paginate($logs,5, $page);
        return view('admin.partials.logs-table-partial', $this->data)->render();
    }
}
