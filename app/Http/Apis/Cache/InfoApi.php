<?php

namespace App\Http\Apis\Cache;

use App\Http\Apis\BaseApi;
use App\Models\CacheModel;
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
        $model = CacheModel::select(["id", "name", "k", "v", "expire", "created_at"])
            ->find($this->id);
        if (!$model) {
            return '无效的数据';
        }
        return $model->toArray();
    }
}
