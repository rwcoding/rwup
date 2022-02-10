<?php

namespace App\Services;

use App\Models\UserModel;
use Illuminate\Support\Str;

class UserService
{
    public static function verify(int $id, string &$msg = ""): ?UserModel
    {
        $user = UserModel::find($id);
        if (!$user) {
            $msg = "无效的用户";
            return null;
        }
        if ($user->status != UserModel::STATUS_OK) {
            $msg = "用户已锁定，请联系管理员";
            return null;
        }
        return $user;
    }

    public static function verifyPassword(string|UserModel $username, string $password, string &$msg = ''): ?UserModel
    {
        if (is_string($username)) {
            $user = UserModel::whereUsername($username)->first();
            if (!$user) {
                $msg = "用户不存在";
                return null;
            }
            if ($user->status != UserModel::STATUS_OK) {
                $msg = "用户无效";
                return null;
            }
        } else {
            $user = $username;
        }

        if (self::createPassword($password, $user->salt) !== $user->password) {
            $msg = "账号或密码错误";
            return null;
        }
        return $user;
    }

    public static function newPassword(UserModel $user, string $password): bool
    {
        $user->salt = self::createSalt();
        $user->password = self::createPassword($password, $user->salt);
        return $user->save();
    }

    public static function createPassword(string $password, string $salt = ""): string
    {
        if (!$salt) {
            $salt = self::createSalt();
        }
        return md5(md5($password) . $salt);
    }

    public static function createSalt(): string
    {
        return Str::random(40);
    }

    public static function statusNames(): array
    {
        return [
            ['k' => UserModel::STATUS_OK, 'v' => '正常'],
            ['k' => UserModel::STATUS_LOCK, 'v' => '锁定'],
        ];
    }
}
