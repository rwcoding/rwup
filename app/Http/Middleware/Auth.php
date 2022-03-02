<?php

namespace App\Http\Middleware;

use App\Http\Context;
use App\Services\AclService;
use App\Services\ApiService;
use App\Services\EnvService;
use App\Services\TokenService;
use App\Services\UserService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Auth
{
    public function handle(Request $request, Closure $next)
    {
        $api = $request->getPathInfo();
        $current = time();
        $time = $request->header("X-Time");
        $token = $request->header("X-Token");
        $sign = $request->header("X-Sign");

        // header 参数必需
        if (!$time || !$token || !$sign) {
            return ApiService::failure("缺少api参数");
        }

        // 请求时间过期
        if (abs($current - $time) > 3600) {
            return ApiService::failure("请求过期");
        }

        $body = $request->getContent();

        if (EnvService::isDebug()) {
            Log::info($body);
        }

        // 允许所有未登陆api
        if (!str_starts_with($api, "/api/open")) {
            $msg = "";

            // token验证
            if (!($tm = TokenService::verify($token, $msg))) {
                return ApiService::failure($msg, ApiService::CODE_LOGIN);
            }
            // Log::info($api . $time . $token . $body . $tm->token_key);
            if (md5($api . $time . $token . $body . $tm->token_key) !== $sign) {
                return ApiService::failure("签名错误");
            }

            // 用户验证
            if (!($user = UserService::verify($tm->user_id, $msg))) {
                return ApiService::failure($msg);
            }

            // 权限验证
            if (!AclService::verifyUser($user, $api)) {
                return ApiService::failure("您没有权限，请联系管理员");
            }
            Context::setUser($user);
        }

        if (!$body) {
            $data = [];
        } else {
            if (!($data = json_decode($body, true))) {
                return ApiService::failure("数据格式错误");
            }
        }

        Context::setRequest($request);
        Context::setData($data);

        return $next($request);
    }
}
