<?php

namespace App\Models;

/**
 * @property int $user_id
 * @property int $platform
 * @property string $token
 * @property string $token_key
 * @property int $expire
 */
class TokenModel extends BaseModel
{
    protected $table = "token";
}
