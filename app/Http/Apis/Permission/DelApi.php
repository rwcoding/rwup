<?php

namespace App\Http\Apis\Permission;

use App\Http\Apis\BaseApi;
use App\Models\PermissionModel;
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
        $model = PermissionModel::find($this->id);
        if (!$model) {
            return ApiService::failure("无效的权限");
        }
        if (!$model->delete()) {
            return ApiService::failure("删除失败");
        }
        return ApiService::success();
    }
}
