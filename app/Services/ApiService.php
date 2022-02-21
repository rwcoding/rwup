<?php

namespace App\Services;

class ApiService
{
    const CODE_OK = 10000;
    const CODE_LOGIN = 11000;
    const CODE_ERR = 99999;

    public static function success(array $data = [], string $msg = '', int $code = self::CODE_OK): string
    {
        $ret = [
            'code' => $code,
            'msg'  => $msg,
        ];
        if ($data) {
            $ret['data'] = $data;
        }
        return json_encode($ret, JSON_UNESCAPED_UNICODE);
    }

    public static function failure(string $msg = '', int $code = self::CODE_ERR): string
    {
        return json_encode([
            'code' => $code,
            'msg'  => $msg,
        ], JSON_UNESCAPED_UNICODE);
    }

}
