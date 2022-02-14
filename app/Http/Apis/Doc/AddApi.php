<?php

namespace App\Http\Apis\Doc;

use App\Http\Apis\BaseApi;
use App\Models\DocLogModel;
use App\Models\DocModel;
use App\Models\ProjectModel;
use App\Services\AclService;
use App\Services\DocService;
use Illuminate\Support\Str;

/**
 * @property string name
 * @property string sname
 * @property string project_id
 * @property string directory_id
 * @property string content
 * @property string share_code
 * @property int is_share
 * @property array<int> deny_read
 * @property array<int> deny_write
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
            "name" => "required|min:2|max:100",
            "sname" => "required|min:2|max:20",
            "deny_read" => "array",
            "deny_write" => "array",
            "project_id" => "required|numeric|min:1",
            "directory_id" => "required|numeric|min:0",
            "is_share" => "required|numeric|min:0",
            "ord" => "required|numeric|min:1",
        ];
        if (!$this->isAdd) {
            $rules['id'] = "required|numeric|min:1";
        }
        return $rules;
    }

    public function index(): string|array
    {
        $userId = $this->getUser()->id;

        if (!$this->isAdd) {
            $model = DocModel::find($this->id);
            if (!$model) {
                return '无效的数据';
            }
            $project = $model->project;
        } else {
            $project = ProjectModel::find($this->project_id);
            $model = new DocModel();
            $model->user_id = $userId;
        }

        if (!$project) {
            return '无效的工程';
        }

        // 权限验证
        if (!AclService::allowWriteProject($project, $userId)) {
            return "您没有权限编辑该工程";
        }
        if (!$this->isAdd && !AclService::allowWriteDoc($model, $userId)) {
            return "您没有权限编辑该文档";
        }

        $model->directory_id = $this->directory_id;
        $model->project_id = $this->project_id;
        $model->name = $this->name;
        $model->sname = $this->sname ?: $this->name;
        $model->content = $this->content;
        $model->deny_read = $this->deny_read ? implode(',', $this->deny_read) : '';
        $model->deny_write = $this->deny_write ? implode(',', $this->deny_write) : '';
        $model->ord = $this->ord;
        $model->is_share = $this->is_share ? 1:0;

        if ($model->is_share && !$model->share_code) {
            $model->share_code = md5(Str::random());
        }

        if (!$model->save()) {
            return '保存失败';
        }

        $project->doc_id = $model->id;
        $project->doc_updater = $userId;
        $project->save();

        DocService::log($model, $userId);

        return ['id' => $model->id];
    }
}
