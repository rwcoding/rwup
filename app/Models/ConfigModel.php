<?php

namespace App\Models;

/**
 * @property string $name 名称
 * @property string $k 键名
 * @property string $v 配置值
 */
class ConfigModel extends BaseModel
{
    protected $table = "config";
}
