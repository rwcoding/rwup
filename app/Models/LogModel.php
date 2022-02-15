<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $user_id
 * @property int $type
 * @property string $msg
 * @property string $details
 * @property int $target
 * @property string $ip
 */
class LogModel extends BaseModel
{
    protected $table = "log";

    const TYPE_LOGIN = 1;
}
