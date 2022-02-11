<?php

namespace App\Http\Apis\Permission;

use App\Http\Apis\BaseApi;
use App\Services\PermissionService;

class PageApi extends BaseApi
{
    public function index(): string|array
    {
        return [
            'groups' => PermissionService::groupNames(),
            'types'  => PermissionService::typeNames(),
        ];
    }
}
