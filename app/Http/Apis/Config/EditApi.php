<?php

namespace App\Http\Apis\Config;

/**
 * @property string k
 * @property string v
 * @property string data_type
 */
class EditApi extends AddApi
{
    protected bool $isAdd = false;
}
