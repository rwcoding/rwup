<?php

namespace App\Http\Apis\Config;

/**
 * @property string k
 * @property string v
 * @property string data_type
 */
class UpdateApi extends AddApi
{
    protected bool $isAdd = false;
}
