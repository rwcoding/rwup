<?php

namespace App\Services;

use App\Models\DocMemberModel;
use App\Models\DocModel;
use App\Models\ProjectMemberModel;
use App\Models\ProjectModel;
use App\Models\RolePermissionModel;
use App\Models\UserModel;

class AclService
{
    public static function getPermissionByRoles(string $roles)
    {
        $key = "acl-" . str_replace($roles, ',', '-');
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

        $key = "acl-" . str_replace($roles, ',', '-');
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

    public static function allowReadProject(ProjectModel $project, UserModel $user): bool
    {
        if ($user->is_super) {
            return true;
        }
        $pm = ProjectMemberModel::where('project_id', $project->id)
            ->where('user_id', $user->id)->first();
        if ($pm && ($pm->manage || $pm->doc_read)) {
            return true;
        }
        return false;
    }

    public static function allowWriteProject(ProjectModel $project, UserModel $user): bool
    {
        if ($user->is_super) {
            return true;
        }
        $pm = ProjectMemberModel::where('project_id', $project->id)
            ->where('user_id', $user->id)->first();
        if ($pm && ($pm->manage || $pm->doc_write)) {
            return true;
        }
        return false;
    }

    public static function allowReadDoc(DocModel $doc, UserModel $user): bool
    {
        if ($user->is_super) {
            return true;
        }

        if ($doc->is_rw || $doc->is_rb) {
            $ps = DocMemberModel::where('doc_id', $doc->id)
                ->where('user_id', $user->id)->get();
            $map = [];
            foreach ($ps as $item) {
                $map[$item->type] = true;
            }
            if ($doc->is_rw && empty($map['rw'])) {
                return false;
            }

            if ($doc->is_rb && empty($map['rb'])) {
                return false;
            }

            return true;
        }

        return self::allowReadProject($doc->project, $user);
    }

    public static function allowWriteDoc(DocModel $doc, UserModel $user): bool
    {
        if ($user->is_super) {
            return true;
        }

        if ($doc->is_ww || $doc->is_wb) {
            $ps = DocMemberModel::where('doc_id', $doc->id)
                ->where('user_id', $user->id)->get();
            $map = [];
            foreach ($ps as $item) {
                $map[$item->type] = true;
            }
            if ($doc->is_ww && empty($map['ww'])) {
                return false;
            }

            if ($doc->is_wb && empty($map['wb'])) {
                return false;
            }

            return true;
        }

        return self::allowWriteProject($doc->project, $user);
    }
}
