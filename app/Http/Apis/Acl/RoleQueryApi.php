<?php

namespace App\Http\Apis\Acl;

use App\Http\Apis\BaseApi;
use App\Models\PermissionGroupModel;
use App\Models\PermissionModel;
use App\Models\RoleModel;
use App\Models\RolePermissionModel;

/**
 * @property int role_id
 */
class RoleQueryApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "role_id" => "required|numeric|min:1",
        ];
    }

    public function index(): string|array
    {
        $role = RoleModel::select(['id', 'name'])->find($this->role_id);
        if (!$role) {
            return "无效的角色";
        }
        $groups = PermissionGroupModel::select(["id", "name"])->orderBy("ord")->get()->toArray();
        $groups[] = ['id'=>0, 'name'=>'未定义分组'];
        $permissions = PermissionModel::select(["id", "permission", "name", "group_id", "type"])->get();
        $havePermissions = RolePermissionModel::whereRoleId($this->role_id)->select(["permission"])->pluck("permission");
        return [
            'role' => $role,
            'groups' => $groups,
            'permissions' => $permissions,
            'own_permissions' => $havePermissions
        ];
    }
}
