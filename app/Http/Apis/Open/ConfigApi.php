<?php

namespace App\Http\Apis\Open;

use App\Http\Apis\BaseApi;
use App\Services\ConfigService;

class ConfigApi extends BaseApi
{
    public function index(): string|array
    {
        return [
            'app' => ConfigService::get('app', '项目管理系统'),
        ];
    }
}
