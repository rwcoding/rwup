<?php

namespace App\Http\Apis\Acl;

use App\Http\Apis\BaseApi;
use App\Models\PermissionGroupModel;
use App\Models\PermissionModel;
use App\Models\RoleModel;

class BatchQueryApi extends BaseApi
{
    public function index(): string|array
    {
        $roles = RoleModel::select(['id', 'name'])->get();
        $groups = PermissionGroupModel::select(["id", "name"])->orderBy("ord")->get();
        $permissions = PermissionModel::select(["id", "permission", "name", "group_id", "type"])->get();
        return [
            'roles' => $roles,
            'groups' => $groups,
            'permissions' => $permissions,
        ];
    }
}
