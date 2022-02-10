<?php

namespace App\Http\Apis\Log;

use App\Http\Apis\BaseApi;
use App\Models\LogModel;
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
        $model = LogModel::select(['id', 'user_id', 'type', 'msg', 'target', 'ip', 'created_at'])
            ->whereId($this->id)
            ->first();
        if (!$model) {
            return ApiService::failure("无效的数据");
        }
        return $model->toArray();
    }
}
