<?php

namespace App\Services;

use App\Models\RoleModel;

class RoleService
{
    public static function names(): array
    {
        return RoleModel::select(["id as k", "name as v"])->get()->toArray();
    }
}
