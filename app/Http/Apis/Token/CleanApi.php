<?php

namespace App\Http\Apis\Token;

use App\Http\Apis\BaseApi;
use App\Models\TokenModel;
use App\Services\ApiService;

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
            TokenModel::query()->where("1=1")->delete();
        } else {
            TokenModel::query()->where("created_at < ".(time() - 30*24*60*60))->delete();
        }

        return ApiService::success();
    }
}
