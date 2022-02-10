<?php

namespace App\Services;

use App\Models\CacheModel;

class CacheService
{
    public static function get(string $key): mixed
    {
        $cache = CacheModel::whereK($key)->first();
        if (!$cache || time() < $cache->expire) {
            return false;
        } else {
            return unserialize($cache->v);
        }
    }

    public static function set(string $key, mixed $value): bool
    {
        CacheModel::whereK($key)->delete();
        return CacheModel::insert([
            'k' => $key,
            'v' => $value,
            'expire' => DateService::afterDay(30)
        ]);
    }
}
