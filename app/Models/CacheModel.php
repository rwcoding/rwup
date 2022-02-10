<?php

namespace App\Models;

/**
 * @property string $name 缓存名称
 * @property string $k 缓存标识
 * @property string $v 序列化缓存数据
 * @property string $expire 过期时间
 * @method static \Illuminate\Database\Eloquent\Builder|static whereK($value)
 */
class CacheModel extends BaseModel
{
    protected $table = "cache";
}
