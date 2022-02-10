<?php

namespace App\Services;

use App\Models\RoleModel;
use App\Models\UserModel;
use Illuminate\Support\Arr;

class RoleService
{
    public static function names(): array
    {
        return RoleModel::select("id as k, name as v")->get()->toArray();
    }
}
