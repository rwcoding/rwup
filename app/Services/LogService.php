<?php

namespace App\Services;

use App\Models\LogModel;
use App\Models\UserModel;

class LogService
{
    public static function add(int $userId, int $type, string $msg, string $ip = '', string $details = '', int $target = 0): bool
    {
        $log = new LogModel();
        $log->user_id = $userId;
        $log->type = $type;
        $log->msg = $msg;
        $log->target = $target;
        $log->details = $details;
        $log->ip = $ip;
        return $log->save();
    }

    public static function login(UserModel $user, string $ip): bool
    {
        return self::add($user->id,
                        LogModel::TYPE_LOGIN,
                        $user->name . '登录',
                        $ip);
    }

    public static function typeNames(): array
    {
        return [
            ['k' => LogModel::TYPE_LOGIN, 'v' => '登录'],
        ];
    }
}
