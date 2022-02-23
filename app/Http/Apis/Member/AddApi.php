<?php

namespace App\Http\Apis\Member;

use App\Http\Apis\BaseApi;
use App\Models\ProjectMemberModel;
use App\Models\ProjectModel;
use App\Models\UserModel;

/**
 * @property int project_id
 * @property string username
 * @property int doc_read
 * @property int doc_write
 * @property int test_read
 * @property int test_write
 * @property int bug_read
 * @property int bug_write
 * @property int manage
 * @property int id
 */
class AddApi extends BaseApi
{
    protected bool $isAdd = true;

    public function rules(): array
    {
        $rules = [
            "doc_read" => "required|numeric",
            "doc_write" => "required|numeric",
            "test_read" => "required|numeric",
            "test_write" => "required|numeric",
            "bug_read"   => "required|numeric",
            "bug_write" => "required|numeric",
            "manage" => "required|numeric",
        ];
        if (!$this->isAdd) {
            $rules['id'] = "required|numeric|min:1";
        }
        if ($this->isAdd) {
            $rules['project_id'] = "required|numeric|min:1";
            $rules['username'] = "required";
        }
        return $rules;
    }

    public function index(): string|array
    {
        if (!$this->isAdd) {
            $model = ProjectMemberModel::find($this->id);
            if (!$model) {
                return '无效的数据';
            }
            $project = ProjectModel::find($model->project_id);
        } else {
            $user = UserModel::whereUsername($this->username)->first();
            if (!$user) {
                return '无效的账号';
            }
            $model = new ProjectMemberModel();
            $project = ProjectModel::find($this->project_id);
            $model->project_id = $this->project_id;
            $model->user_id = $user->id;
        }

        if (!$project) {
            return '无效的工程';
        }

        if (!$this->getUser()->isSuper()) {
            $pmm = ProjectMemberModel::where('project_id', $project->id)
                ->where('user_id', $this->getUser()->id)
                ->first();
            if (!$pmm || !$pmm->manage) {
                return '您没有权限';
            }
        }

        $model->doc_read = $this->doc_read;
        $model->doc_write = $this->doc_write;
        $model->test_read = $this->test_read;
        $model->test_write = $this->test_write;
        $model->bug_read = $this->bug_read;
        $model->bug_write = $this->bug_write;
        $model->manage = $this->manage;

        if (!$model->save()) {
            return '保存失败';
        }
        return ['id' => $model->id];
    }
}
