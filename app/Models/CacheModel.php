<?php

namespace App\Models;

/**
 * @property string $name 缓存名称
 * @property string $sign 缓存标识
 * @property string $data 序列化缓存数据
 * @method static \Illuminate\Database\Eloquent\Builder|static whereSign($value)
 */
class CacheModel extends BaseModel
{
    protected $table = "cache";
}
