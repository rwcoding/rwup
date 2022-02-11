<?php

namespace App\Http\Middleware;

use App\Http\Context;
use App\Services\AclService;
use App\Services\ApiService;
use App\Services\TokenService;
use App\Services\UserService;
use Closure;
use Illuminate\Http\Request;

class Auth
{
    public function handle(Request $request, Closure $next)
    {
        $api = $request->getPathInfo();
        $current = time();
        $time = $request->header("Ms-Time");
        $token = $request->header("Ms-Token");
        $sign = $request->header("Ms-Sign");

        // header 参数必需
        if (!$time || !$token || !$sign) {
            return ApiService::failure("缺少api参数");
        }

        // 请求时间过期
        if (abs($current - $time) > 3600) {
            return ApiService::failure("请求过期");
        }

        // 允许所有未登陆api
        if (str_starts_with($api, "/api/login")) {
            return $next($request);
        }

        $msg = "";

        // token验证
        if (!($tm = TokenService::verify($token, $msg))) {
            return ApiService::failure($msg);
        }

        // 用户验证
        if (!($user = UserService::verify($tm->user_id, $msg))) {
            return ApiService::failure($msg);
        }

        // 权限验证
        if (!AclService::verify($user->roles, $api)) {
            return ApiService::failure("您没有权限，请联系管理员");
        }

        if (!($data = json_decode($request->getContent(), true))) {
            return ApiService::failure("数据格式错误");
        }

        Context::setRequest($request);
        Context::setData($data);
        Context::setUser($user);

        return $next($request);
    }
}
