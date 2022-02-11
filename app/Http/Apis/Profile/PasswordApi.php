<?php

namespace App\Http\Apis\Profile;

use App\Http\Apis\BaseApi;
use App\Http\Context;
use App\Services\ApiService;
use App\Services\UserService;

/**
 * @property string old_password
 * @property string new_password
 */
class PasswordApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "old_password" => "required|min:5|max:30",
            "new_password" => "required|min:5|max:30",
        ];
    }

    public function index(): string|array
    {
        $user = Context::user();

        // 验证密码
        if (!UserService::verifyPassword($user, $this->old_password)) {
            return ApiService::failure('密码验证错误');
        }

        if (!UserService::newPassword($user, $this->new_password)) {
            return ApiService::failure('修改失败');
        }

        return ApiService::success();
    }
}
