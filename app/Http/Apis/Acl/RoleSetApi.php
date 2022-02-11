<?php

namespace App\Http\Apis\Acl;

use App\Http\Apis\BaseApi;
use App\Models\PermissionModel;
use App\Models\RoleModel;
use App\Models\RolePermissionModel;
use App\Services\AclService;
use App\Services\ApiService;

/**
 * @property int role_id
 * @property array<int> permissions
 */
class RoleSetApi extends BaseApi
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
        if ($this->permissions && PermissionModel::where(["id", 'in', $this->permissions])->count() != count($this->permissions)) {
            return "权限集合有误";
        }

        RolePermissionModel::whereRoleId($this->role_id)->delete();
        if ($this->permissions) {
            $data = [];
            foreach (PermissionModel::where(["id", 'in', $this->permissions])->get() as $item) {
                $data[] = ['role_id' => $this->role_id, 'permission' => $item->permission];
            }
            RolePermissionModel::insert($data);
        }
        AclService::updateCacheByRole($this->role_id);

        return ApiService::success();
    }
}
