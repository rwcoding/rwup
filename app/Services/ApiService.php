<?php

namespace App\Services;

class ApiService
{
    public static function success(array $data = [], string $msg = '', int $code = 10000): string
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

    public static function failure(string $msg = '', int $code = 99999): string
    {
        return json_encode([
            'code' => $code,
            'msg'  => $msg,
        ], JSON_UNESCAPED_UNICODE);
    }

}
