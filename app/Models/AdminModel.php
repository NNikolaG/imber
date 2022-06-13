<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;

class AdminModel extends Model
{
    use HasFactory;

    public function getRoles()
    {
        return DB::table('roles')
            ->get();
    }

    public function createRole($role)
    {
        DB::table('roles')->insert($role);
    }

    public function deleteRole($id)
    {
        DB::table('roles')
            ->where('role_id', $id['role_id'])
            ->delete();
    }

    public function returnRole($id)
    {
        return DB::table('roles')
            ->where('role_id', $id)
            ->first();
    }

    public function updateRole($id, $name)
    {
        DB::table('roles')
            ->where('role_id', $id)
            ->update(['role_name' => $name]);
    }

    public function createNav($nav)
    {
        DB::table('navlinks')->insert($nav);
    }

    public function deleteNav($id)
    {
        DB::table('navlinks')
            ->where('navlink_id', $id['navlink_id'])
            ->delete();
    }

    public function returnNav($id)
    {
        return DB::table('navlinks')
            ->where('navlink_id', $id)
            ->first();
    }

    public function updateNav($id, $name, $route, $alt)
    {
        DB::table('navlinks')
            ->where('navlink_id', $id)
            ->update(['name' => $name, 'route' => $route, 'alttag' => $alt]);
    }

    public function getDataFromLaravelLog($date = '')
    {
        $logs = [];
        foreach (file(storage_path() . '/logs/laravel.log') as $line) {
            if (str_contains($line, ".INFO")) {

                $string['date'] = substr(explode(' ', $line)[0], 1, strlen(explode(' ', $line)[0]));
                $string['time'] = substr(explode(' ', $line)[1], 0, -1);
                $string['type'] = substr(explode(' ', $line)[3], 0, -1);
                $string['message'] = explode(' ', $line)[4];

                $user = explode(' ', $line)[5];
                $user = substr($user, 1, -2);
                $user = explode(',', $user);

                $name = substr(explode(':', substr($user[0], 1, -1))[1], 1, strlen(explode(':', substr($user[0], 1, -1))[1]));
                $email = substr(explode(':', substr($user[1], 1, -1))[1], 1, strlen(explode(':', substr($user[1], 1, -1))[1]));

                $string['user'] = $name;
                $string['email'] = $email;
                array_push($logs, $string);
            }
        }
        if ($date != '') {
            $logsFilter = [];
            try {
                $timex = strtotime($date);
                foreach ($logs as $e) {
                    $time = strtotime($e['date']);
                    if ($time == $timex) {
                        array_push($logsFilter, $e);
                    }
                }
                return $logsFilter;

            } catch (\Exception $exception) {
                Log::error($exception->getMessage());
                return $logs;
            }
        }
        $logs = array_reverse($logs, true);
        return $logs;
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
