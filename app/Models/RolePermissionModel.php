<?php

namespace App\Models;

/**
 * @property int $role_id
 * @property string $permission 角色对应权限
 * @method static \Illuminate\Database\Eloquent\Builder|static whereRoleId($value)
 */
class RolePermissionModel extends BaseModel
{
    protected $table = "role_permission";
}
