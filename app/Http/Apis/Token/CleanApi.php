<?php

namespace App\Http\Apis\Token;

use App\Http\Apis\BaseApi;
use App\Models\TokenModel;
use App\Services\ApiService;
use App\Services\DateService;

/**
 * @property int type 1 删除所有数据  2 删除过期数据
 */
class CleanApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "type" => "required|numeric|min:0|max:2",
        ];
    }

    public function index(): string|array
    {
        if ($this->type == 1) {
            TokenModel::query()->whereRaw("1=1")->delete();
        } else {
            TokenModel::query()->whereRaw("expire < ?", DateService::now())->delete();
        }

        return ApiService::success();
    }
}
