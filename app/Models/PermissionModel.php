<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name 权限名称
 * @property string $permission 权限标识
 * @property int $gid 权限类型
 * @property int $type api权限或自定义权限
 */
class PermissionModel extends BaseModel
{
    protected $table = "permission";
}
