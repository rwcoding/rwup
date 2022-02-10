<?php

namespace App\Http\Apis\Permission;

use App\Http\Apis\BaseApi;
use App\Models\PermissionModel;
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
        $model = PermissionModel::query()
            ->select(['id', 'name', 'permission', 'group_id', 'type', 'created_at'])
            ->find($this->id);
        if (!$model) {
            return ApiService::failure("无效的数据");
        }
        return $model->toArray();
    }
}
