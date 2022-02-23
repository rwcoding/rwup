<?php

namespace App\Http\Apis\Member;

use App\Http\Apis\BaseApi;
use App\Models\ProjectMemberModel;
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
        $model = ProjectMemberModel::find($this->id);
        if (!$model) {
            return '无效的数据';
        }
        if (!$model->delete()) {
            return '删除失败';
        }
        return ApiService::success();
    }
}
