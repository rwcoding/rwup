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
 * @property string title
 * @property string sign
 * @property string stitle
 * @property string project_id
 * @property string directory_id
 * @property string share_code
 * @property int is_share
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
            "title" => "required|min:2|max:100",
            "stitle" => "required|min:2|max:20",
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
        $user = $this->getUser();
        $userId = $user->id;
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
            $model->project_id = $this->project_id;
            $model->content = "";
            $model->content_json = "";
        }

        if (!$project) {
            return '无效的工程';
        }

        // 权限验证
        if ($this->isAdd && !AclService::allowWriteProject($project, $user)) {
            return "您没有权限编辑该项目";
        }

        if (!$this->isAdd && !AclService::allowWriteDoc($model, $user)) {
            return "您没有权限编辑该文档";
        }

        $model->directory_id = $this->directory_id;
        // $model->sign = $this->sign;
        $model->title = $this->title;
        $model->stitle = $this->stitle ?: $this->title;
        $model->ord = $this->ord;
        if (!$model->is_share && $this->is_share) {
            $model->share_code = md5(Str::random());
        }
        $model->is_share = $this->is_share ? 1 : 0;

        if (!$model->save()) {
            return '保存失败';
        }

        $project->doc_id = $model->id;
        $project->doc_updater = $userId;
        $project->save();

        // 修改内容时保存日志
        // DocService::log($model, $userId);

        return ['id' => $model->id];
    }
}
