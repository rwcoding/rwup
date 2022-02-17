<?php

namespace App\Http\Apis\Open;

use App\Http\Apis\BaseApi;
use App\Services\ApiService;
use App\Services\TokenService;

class LogoutApi extends BaseApi
{
    public function index(): string|array
    {
        TokenService::delete($this->getToken());
        return ApiService::success();
    }
}
