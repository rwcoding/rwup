<?php

namespace App\Http\Apis\Role;

use App\Http\Apis\BaseApi;
use App\Models\RoleModel;
use App\Services\ApiService;

/**
 * @property string name
 */
class AddApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "name" => "required|min:2",
        ];
    }

    public function index(): string|array
    {
        if (RoleModel::where("name", $this->name)->exists()) {
            return ApiService::failure('角色名已经存在');
        }
        $model = new RoleModel();
        $model->name = trim($this->name);
        if (!$model->save()) {
            return ApiService::failure('添加失败');
        }
        return ['id' => $model->id];
    }
}
