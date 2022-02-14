<?php

namespace App\Http\Apis\Config;

use App\Http\Apis\BaseApi;
use App\Models\ConfigModel;
use App\Services\ApiService;
use App\Services\ConfigService;

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
        $model = ConfigModel::find($this->id);
        if (!$model) {
            return '无效的数据';
        }
        if (!ConfigService::delete($model)) {
            return '删除失败';
        }
        return ApiService::success();
    }
}
