<?php

namespace App\Http;

use App\Models\UserModel;
use Illuminate\Http\Request;

class Context
{
    private static ?UserModel $user;
    private static array $data = [];
    private static ?Request $request;

    public static function setUser(UserModel $user): void
    {
        self::$user = $user;
    }

    public static function user(): ?UserModel
    {
        return self::$user;
    }

    public static function setData(array $data): void
    {
        self::$data = $data;
    }

    public static function data(): array
    {
        return self::$data;
    }

    public static function setRequest(Request $request): void
    {
        self::$request = $request;
    }

    public static function request(): Request
    {
        return self::$request;
    }

    public static function reset(): void
    {
        self::$user = null;
        self::$data = [];
        self::$request = null;
    }
}
