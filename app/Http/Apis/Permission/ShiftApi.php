<?php

namespace App\Http\Apis\Permission;

use App\Http\Apis\BaseApi;
use App\Models\PermissionModel;
use App\Services\ApiService;

/**
 * @property string permission
 * @property int group_id
 */
class ShiftApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "permission" => "required|min:2|max:100",
            "group_id" => "required|numeric|min:1",
        ];
    }

    public function index(): string|array
    {
        if (!PermissionModel::where(
            'permission', 'like', '%'.$this->permission.'%'
        )->update(['group_id'=>$this->group_id])) {
            return "转移失败或没有找到匹配的权限";
        }

        return ApiService::success();
    }
}
