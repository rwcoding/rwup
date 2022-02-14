<?php

namespace App\Http\Apis\Project;

use App\Http\Apis\BaseApi;
use App\Models\DocModel;
use App\Models\ProjectModel;
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
        $model = ProjectModel::find($this->id);
        if (!$model) {
            return '无效的数据';
        }

        if (DocModel::where("project_id", $model->id)->count() > 0) {
            return '该工程下还有文档，无法删除！';
        }

        if (!$model->delete()) {
            return '删除失败';
        }
        return ApiService::success();
    }
}
