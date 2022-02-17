<?php

namespace App\Http\Apis\Open;

use App\Http\Apis\BaseApi;
use App\Services\LogService;
use App\Services\TokenService;
use App\Services\UserService;

/**
 * @property string $username
 * @property string $password
 * @property int $platform
 */
class LoginApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "username" => "required|min:5|max:30",
            "password" => "required|min:5|max:50",
            "platform" => "required|numeric|min:10|max:99",
        ];
    }

    public function index(): string|array
    {
        $msg = "";
        $user = UserService::verifyPassword(trim($this->username), trim($this->password), $msg);
        if (!$user) {
            return $msg;
        }

        if (!($arr = TokenService::newToken($user->id, $this->platform))) {
            return "认证写入失败";
        }

        LogService::login($user, $this->getRequest()->ip());

        return [
            'token' => $arr['token'],
            'key' => $arr['key'],
        ];
    }
}
