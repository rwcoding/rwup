<?php

namespace App\Http\Apis\Profile;

use App\Http\Apis\BaseApi;
use App\Http\Context;
use App\Services\RoleService;
use App\Services\UserService;

class InfoApi extends BaseApi
{
    public function index(): string|array
    {
        $user = Context::user();

        return [
            'username' => $user->username,
            'name' => $user->name,
            'phone' => $user->phone,
            'roles' => $user->roles,
            'status' => $user->status,
            'is_super' => $user->is_super,
            'created_at' => $user->created_at,
            'role_names' => RoleService::names(),
            'status_names' => UserService::statusNames(),
        ];
    }
}
