<?php

namespace App\Services;

use App\Models\PermissionGroupModel;
use App\Models\PermissionModel;

class PermissionService
{
    public static function typeNames(): array
    {
        return [
            ['k'=>PermissionModel::TYPE_ROUTE, 'v'=>'路由'],
            ['k'=>PermissionModel::TYPE_CUSTOMIZE, 'v'=>'自定义'],
        ];
    }

    public static function groupNames(): array
    {
        return PermissionGroupModel::select(["id as k", "name as v"])->get()->toArray();
    }
}
