<?php

namespace App\Http\Apis\Acl;

use App\Http\Apis\BaseApi;
use App\Models\PermissionGroupModel;
use App\Models\PermissionModel;
use App\Models\RoleModel;

/**
 * @property int role_id
 */
class BatchQueryApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "role_id" => "required|numeric|min:1",
        ];
    }

    public function index(): string|array
    {
        $role = RoleModel::select(['id', 'name'])->get();
        $groups = PermissionGroupModel::select(["id", "name"])->orderBy("ord")->get();
        $permissions = PermissionModel::select(["id", "permission", "name", "group_id", "type"])->get();
        return [
            'role' => $role,
            'groups' => $groups,
            'permissions' => $permissions,
        ];
    }
}
