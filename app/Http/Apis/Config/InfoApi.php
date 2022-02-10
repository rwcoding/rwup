<?php

namespace App\Http\Apis\Config;

use App\Http\Apis\BaseApi;
use App\Models\ConfigModel;
use App\Services\ApiService;

/**
 * @property int id
 */
class InfoApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "id" => "required|numeric|min:1",
        ];
    }

    public function index(): string|array
    {
        $model = ConfigModel::select(['id', 'name', 'k', 'v', 'data_type', 'created_at'])
            ->whereId($this->id)
            ->first();
        if (!$model) {
            return ApiService::failure("无效的配置");
        }
        return $model->toArray();
    }
}
