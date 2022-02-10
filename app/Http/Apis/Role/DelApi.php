<?php

namespace App\Http\Apis\Role;

use App\Http\Apis\BaseApi;
use App\Models\RoleModel;
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
        $model = RoleModel::find($this->id);
        if (!$model) {
            return ApiService::failure("无效的角色");
        }
        if (!$model->delete()) {
            return ApiService::failure("删除失败");
        }
        return ApiService::success();
    }
}
