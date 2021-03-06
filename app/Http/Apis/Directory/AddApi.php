<?php

namespace App\Http\Apis\Directory;

use App\Http\Apis\BaseApi;
use App\Models\DirectoryModel;
use App\Models\ProjectModel;
use App\Services\AclService;

/**
 * @property string name
 * @property int project_id
 * @property int pid
 * @property int ord
 * @property int id
 */
class AddApi extends BaseApi
{
    protected bool $isAdd = true;

    protected array $notNeedFormatField = ['content'];

    public function rules(): array
    {
        $rules = [
            "name"       => "required|min:2|max:100",
            "pid"        => "required|numeric|min:0",
            "ord"        => "required|numeric|min:1",
        ];
        if (!$this->isAdd) {
            $rules['id'] = "required|numeric|min:1";
        } else {
            $rules['project_id'] = "required|numeric|min:1";
        }
        return $rules;
    }

    public function index(): string|array
    {
        if (!$this->isAdd) {
            $model = DirectoryModel::find($this->id);
            if (!$model) {
                return '无效的数据';
            }
            if ($model->id == $this->pid) {
                return '无效的上级目录';
            }
            $project = $model->project;
        } else {
            $project = ProjectModel::find($this->project_id);
            $model = new DirectoryModel();
            $model->project_id = $this->project_id;
        }

        if (!$project) {
            return '无效的工程';
        }

        // 权限验证
        if (!AclService::allowWriteProject($project, $this->getUser())) {
            return "您没有权限编辑该工程";
        }

        $model->name = $this->name;
        $model->pid = $this->pid;
        $model->ord = $this->ord;

        if (!$model->save()) {
            return '保存失败';
        }
        return ['id' => $model->id];
    }
}
