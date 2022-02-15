<?php

namespace App\Services;

class EnvService
{
    public static function isProd(): bool
    {
        return env('APP_ENV') === 'production';
    }

    public static function isDebug(): bool
    {
        return env('APP_DEBUG', false);
    }
}
