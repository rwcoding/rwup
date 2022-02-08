<?php

namespace App\Services;

use App\Models\CacheModel;
use App\Models\RolePermissionModel;

class AclService
{
    public static function verify(string $roles, string $permission): bool
    {
        $key = "acl-".str_replace($roles,',','-');
        $cache = CacheModel::where("sign", $key)->first();
        if (!$cache) {
            return in_array($permission, self::createCache($key));
        } else {
            $ps = $cache->data;
            return str_contains(','.$ps.',', ','.$permission.',');
        }
    }

    public static function createCache(string $roles): array
    {
        $rs = explode(',', $roles);
        $data = [];
        foreach ($rs as $rid) {
            $rps = RolePermissionModel::whereRoleId($rid)->pluck('permission')->toArray();
            $data = array_merge($data, $rps);
        }
        $data = array_unique($data);
        $cache = CacheModel::whereSign($roles)->first();
        if (!$cache) {
            $cache = new CacheModel();
            $cache->sign = $roles;
        }
        $cache->data = $data ? implode(",", $data) : '';
        $cache->save();
        return $data;
    }
}
