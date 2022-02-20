<?php

namespace App\Http\Apis\Acl;

use App\Http\Apis\BaseApi;
use App\Models\PermissionModel;
use App\Models\RoleModel;
use App\Models\RolePermissionModel;
use App\Services\AclService;
use App\Services\ApiService;

/**
 * @property int type 1 add  2 delete
 * @property array<int> roles
 * @property array<int> permissions
 */
class BatchSetApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "type" => "required|numeric",
            "roles" => "required",
        ];
    }

    public function index(): string|array
    {
        if ($this->permissions && PermissionModel::whereIn("id", $this->permissions)->count() != count($this->permissions)) {
            return "权限集合有误";
        }

        foreach ($this->roles as $roleId) {
            if (!RoleModel::find($roleId)) {
                continue;
            }
            if ($this->type == 1) {
                if ($this->permissions) {
                    $data = [];
                    $own = RolePermissionModel::whereRoleId($roleId)->pluck("permission")->toArray();
                    foreach (PermissionModel::whereIn("id", $this->permissions)->pluck('permission') as $item) {
                        if (in_array($item, $own)) {
                            continue;
                        }
                        $data[] = ['role_id' => $roleId, 'permission' => $item];
                    }
                    RolePermissionModel::insert($data);
                }
            } else {
                if (!$this->permissions) {
                    continue;
                }
                $permissions = PermissionModel::whereIn("id", $this->permissions)
                    ->pluck("permission");
                RolePermissionModel::where('role_id', $roleId)
                    ->whereIn('permission', $permissions)->delete();
            }

            AclService::updateCacheByRole($roleId);
        }

        return ApiService::success();
    }
}
