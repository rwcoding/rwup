<?php

namespace App\Http\Apis\Profile;

use App\Http\Apis\BaseApi;
use App\Http\Context;
use App\Services\ApiService;

/**
 * @property string name
 * @property string phone
 */
class UpdateApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "name" => "required|min:2|max:30",
            "phone" => "required|min:8|max:20",
        ];
    }

    public function index(): string|array
    {
        $user = Context::user();
        $user->name = $this->name;
        $user->phone = $this->phone;
        if (!$user->save()) {
            return '修改失败';
        }
        return ApiService::success();
    }
}
