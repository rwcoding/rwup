<?php

namespace App\Models;

/**
 * @property string $username 用户名
 * @property string $salt 密码盐
 * @property string $password 密码
 * @property string $name 名字
 * @property string $phone 手机
 * @property string $roles 角色ID集合 逗号分隔
 * @property int $status 状态
 * @property int $is_super 是否超级管理员
 * @property string $ip
 * @property int $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|static whereUsername($value)
 */
class UserModel extends BaseModel
{
    const STATUS_OK   = 1;
    const STATUS_LOCK = 2;

    protected $table = "user";
}
