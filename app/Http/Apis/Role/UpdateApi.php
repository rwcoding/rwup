<?php

namespace App\Http\Apis\Role;

use App\Http\Apis\BaseApi;
use App\Models\RoleModel;
use App\Services\ApiService;

/**
 * @property int id
 * @property string name
 */
class UpdateApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "id" => "required|numeric|min:1",
            "name" => "required|min:2",
        ];
    }

    public function index(): string|array
    {
        $model = RoleModel::find($this->id);
        if (!$model) {
            return ApiService::failure("无效的角色");
        }
        $model->name = $this->name;
        if (!$model->save()) {
            return ApiService::failure("修改失败");
        }
        return ApiService::success();
    }
}
