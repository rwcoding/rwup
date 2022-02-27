<?php

namespace App\Http\Apis\Permission;

use App\Http\Apis\BaseApi;
use App\Models\PermissionModel;
use App\Services\ApiService;
use App\Services\DateService;
use App\Services\PermissionService;
use Illuminate\Support\Arr;

class RouteApi extends BaseApi
{
    public function index(): string|array
    {
        $routes = require base_path('routes') . '/names.php';
        $ps = PermissionModel::where('type', PermissionModel::TYPE_ROUTE)
            ->get();
        $currentDate = DateService::now();
        $delete = [];
        $update = [];
        $insert = [];
        foreach ($ps as $item) {
            if (!isset($routes[$item->permission])) {
                $delete[] = $item->id;
                continue;
            }
            if ($routes[$item->permission] != $item->name) {
                $update[] = [
                    'id' => $item->id,
                    'name' => $routes[$item->permission]
                ];
            }
        }
        foreach ($routes as $k => $v) {
            if (!$ps->where('permission', $k)->count()) {
                $insert[] = [
                    'name' => $v,
                    'permission' => $k,
                    'type' => PermissionModel::TYPE_ROUTE,
                    'created_at' => $currentDate
                ];
            }
        }
        if ($insert) {
            PermissionModel::insert($insert);
        }
        if ($delete) {
            PermissionModel::whereIn('id', $delete)->delete();
        }
        if ($update) {
            foreach ($update as $item) {
                PermissionModel::whereId($item['id'])->update(['name' => $item['name']]);
            }
        }
        return ApiService::success();
    }
}
