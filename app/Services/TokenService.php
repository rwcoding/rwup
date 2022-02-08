<?php

namespace App\Services;

use App\Models\TokenModel;
use Illuminate\Support\Str;

class TokenService
{
    public static function verify(string $token, string &$msg = ''): ?TokenModel
    {
        $tm = TokenModel::where("token", $token)->first();
        if (!$tm) {
            $msg = "无效的token";
            return null;
        }
        if (time() - $tm->created_at > 30*24*60*60) {
            $tm->delete();
            $msg = "token已过期";
            return null;
        }
        return $tm;
    }

    public static function newToken(int $userId, int $platform): ?array
    {
        // 不允许多端登陆
        TokenModel::where(['platform'=>$platform, 'user_id'=>$userId])->delete();
        $token = md5($userId.'-'.Str::random(40));
        $tokenKey = md5($userId.'='.Str::random(40));
        $model = new TokenModel();
        $model->user_id = $userId;
        $model->platform = $platform;
        $model->token = $token;
        $model->token_key = $tokenKey;
        $model->expire = time() + 30 * 24 * 60 * 60;
        if ($model->save()) {
            return ['token'=>$token, 'key'=>$tokenKey];
        }
        return null;
    }
}
