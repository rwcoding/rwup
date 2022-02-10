<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $user_id
 * @property int $platform
 * @property string $token
 * @property string $token_key
 * @property int $expire
 *
 * @property UserModel $user
 */
class TokenModel extends BaseModel
{
    protected $table = "token";

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'id');
    }
}
