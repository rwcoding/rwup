<?php

namespace App\Http\Apis\Directory;

use App\Http\Apis\BaseApi;
use App\Models\DirectoryModel;
use App\Services\AclService;
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
        $model = DirectoryModel::find($this->id);
        if (!$model) {
            return '无效的数据';
        }
        $project = $model->project;

        // 权限验证
        if (!AclService::allowWriteProject($project, $this->getUser()->id)) {
            return "您没有权限编辑该工程";
        }

        if (!$model->delete()) {
            return '删除失败';
        }
        return ApiService::success();
    }
}
