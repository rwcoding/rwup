<?php

namespace App\Http\Apis\Role;

use App\Http\Apis\BaseApi;
use App\Models\RoleModel;
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
        $model = RoleModel::select("id,name")->where("id", $this->id)->first();
        if (!$model) {
            return ApiService::failure("无效的角色");
        }
        return $model->toArray();
    }
}
