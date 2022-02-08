<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $pid 父类型
 * @property string $name 权限类型名称
 * @property int $ord
 */
class PermissionGroupModel extends BaseModel
{
    protected $table = "permission_group";
}
