<?php

namespace App\Services;

use App\Models\LogModel;
use App\Models\UserModel;

class LogService
{
    public static function new(): LogItemService
    {
        return (new LogItemService());
    }

    public static function login(UserModel $user, string $ip): bool
    {
        return (new LogItemService())
            ->userId($user->id)
            ->type(LogModel::TYPE_LOGIN)
            ->msg( $user->name . '登录')
            ->ip($ip)->save();
    }

    public static function typeNames(): array
    {
        return [
            ['k' => LogModel::TYPE_LOGIN, 'v' => '登录'],
        ];
    }
}
