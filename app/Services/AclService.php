<?php

namespace App\Services;

use App\Models\DocModel;
use App\Models\ProjectModel;
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

    public static function verifyUser(UserModel $user, string $permission): bool
    {
        if ($user->is_super) {
            return true;
        }
        return in_array($permission, self::getPermissionByRoles($user->roles));
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

    public static function updateCacheByRole(int $roleId): void
    {
        $us = UserModel::whereRaw("FIND_IN_SET(?, roles)", $roleId)
            ->groupBy("roles")->get();
        foreach ($us as $item) {
            self::createCache($item->roles);
        }
    }

    //todo rw
    public static function allowReadProject(ProjectModel $project, UserModel $user): bool
    {
        if ($user->is_super) {
            return true;
        }
        return true;
    }

    public static function allowWriteProject(ProjectModel $project, UserModel $user): bool
    {
        if ($user->is_super) {
            return true;
        }
        return true;
    }

    public static function allowReadDoc(DocModel $doc, UserModel $user): bool
    {
        return true;
//        return !in_array($userId, explode(',',$doc->deny_read));
    }

    public static function allowWriteDoc(DocModel $doc, UserModel $user): bool
    {
        return true;
//        return !in_array($userId, explode(',',$doc->deny_write));
    }
}
