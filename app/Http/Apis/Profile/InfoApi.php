<?php

namespace App\Http\Apis\Profile;

use App\Http\Apis\BaseApi;
use App\Http\Context;
use App\Services\AclService;
use App\Services\RoleService;
use App\Services\UserService;

class InfoApi extends BaseApi
{
    public function index(): string|array
    {
        $user = Context::user();

        if ($user->is_super) {
            $permissions = ['-1'];
        } else {
            $permissions = AclService::getPermissionByRoles($user->roles);
        }
        return [
            'username' => $user->username,
            'name' => $user->name,
            'phone' => $user->phone,
            'roles' => $user->roles,
            'status' => $user->status,
            'is_super' => $user->is_super,
            'created_at' => $user->created_at,
            'permissions' => $permissions
        ];
    }
}
