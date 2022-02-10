<?php

namespace App\Models;

/**
 * @property string $name 名称
 * @property string $k 键名
 * @property string $v 配置值
 * @property string $data_type 类型  string json array(,)
 * @method static \Illuminate\Database\Eloquent\Builder|static whereK($value)
 */
class ConfigModel extends BaseModel
{
    protected $table = "config";
}
