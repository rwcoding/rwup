<?php

namespace App\Http\Apis\Doc;

use App\Http\Apis\BaseApi;
use App\Models\DocModel;
use App\Models\ProjectModel;
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
        $model = DocModel::find($this->id);
        if (!$model) {
            return '无效的数据';
        }
        $project = $model->project;

        // 权限验证
        if (!AclService::allowWriteProject($project, $this->getUser()->id)) {
            return "您没有权限编辑该工程";
        }
        if (!AclService::allowWriteDoc($model, $this->getUser()->id)) {
            return "您没有权限编辑该文档";
        }

        if (!$model->delete()) {
            return '删除失败';
        }
        return ApiService::success();
    }
}
