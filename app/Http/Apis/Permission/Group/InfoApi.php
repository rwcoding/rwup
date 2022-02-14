<?php

namespace App\Http\Apis\Permission\Group;

use App\Http\Apis\BaseApi;
use App\Models\PermissionGroupModel;
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
        $model = PermissionGroupModel::query()
            ->select(['id', 'name', 'ord'])
            ->find($this->id);
        if (!$model) {
            return '无效的数据';
        }
        return $model->toArray();
    }
}
