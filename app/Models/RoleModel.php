<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $name
 */
class RoleModel extends BaseModel
{
    use SoftDeletes;

    protected $table = "role";
}
