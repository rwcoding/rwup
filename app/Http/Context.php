<?php

namespace App\Http;

use App\Models\UserModel;

class Context
{
    private static ?UserModel $user;
    private static array $data = [];

    public static function setUser(UserModel $user)
    {
        self::$user = $user;
    }

    public static function user(): ?UserModel
    {
        return self::$user;
    }

    public static function setData(array $data)
    {
        self::$data = $data;
    }

    public static function data(): array
    {
        return self::$data;
    }

    public static function reset()
    {
        self::$user = null;
        self::$data = [];
    }
}
