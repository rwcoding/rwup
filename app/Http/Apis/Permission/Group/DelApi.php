<?php

namespace App\Http\Apis\Permission\Group;

use App\Http\Apis\BaseApi;
use App\Models\PermissionGroupModel;
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
        $model = PermissionGroupModel::find($this->id);
        if (!$model) {
            return '无效的数据';
        }
        if (!$model->delete()) {
            PermissionModel::where("group_id", $this->id)->update(['group_id' => 0]);
            return '删除失败';
        }
        return ApiService::success();
    }
}
