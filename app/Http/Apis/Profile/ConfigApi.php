<?php

namespace App\Http\Apis\Profile;

use App\Http\Apis\BaseApi;
use App\Services\RoleService;
use App\Services\UserService;

class ConfigApi extends BaseApi
{
    public function index(): string|array
    {
        return [
            'roles'  => RoleService::names(),
            'status' => UserService::statusNames(),
        ];
    }
}
