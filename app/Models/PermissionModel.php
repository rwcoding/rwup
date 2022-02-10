<?php

namespace App\Models;

/**
 * @property string $name 权限名称
 * @property string $permission 权限标识
 * @property int $group_id 权限类型
 * @property int $type api权限或自定义权限
 */
class PermissionModel extends BaseModel
{
    protected $table = "permission";
}
