<?php

namespace App\Http\Apis\Cache;

use App\Http\Apis\BaseApi;
use App\Models\CacheModel;
use App\Services\ApiService;

/**
 * @property int id
 */
class DelApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "id" => "required|numeric|min:1",
        ];
    }

    public function index(): string|array
    {
        $model = CacheModel::find($this->id);
        if (!$model) {
            return ApiService::failure("无效的数据");
        }
        if (!$model->delete()) {
            return ApiService::failure("删除失败");
        }
        return ApiService::success();
    }
}
