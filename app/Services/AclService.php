<?php

namespace App\Services;

use App\Models\CacheModel;
use App\Models\PermissionModel;
use App\Models\RolePermissionModel;
use App\Models\UserModel;

class AclService
{
    public static function getPermissionByRoles(string $roles)
    {
        $key = "acl-".str_replace($roles,',','-');
        $cache = CacheService::get($key);
        if ($cache === false) {
            return self::createCache($roles);
        }
        return $cache;
    }

    public static function verify(string $roles, string $permission): bool
    {
        return in_array($permission, self::getPermissionByRoles($roles));
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

        $key = "acl-".str_replace($roles,',','-');
        CacheService::set($key, $data);

        return $data;
    }

    public static function updateCacheByRole(int $roleId)
    {
        $us = UserModel::whereRaw("FIND_IN_SET(?, roles)", $roleId)
            ->groupBy("roles")->get();
        foreach ($us as $item) {
            self::createCache($item->roles);
        }
    }
}
