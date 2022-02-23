<?php

namespace App\Http\Apis\Member;

use App\Http\Apis\BaseApi;
use App\Models\ProjectMemberModel;
use App\Models\ProjectModel;

/**
 * @property int id
 */
class InfoApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "id" => "required|numeric|min:1",
        ];
    }

    public function index(): string|array
    {
        $model = ProjectMemberModel::query()
                ->with(['user'=>function($query) {
                    $query->select(['id', 'name', 'username']);
                }])
                ->select(['id', 'user_id', 'project_id', 'doc_read', 'doc_write',
                    'test_read','test_write', 'bug_read', 'bug_write', 'manage'])
                ->find($this->id);
        if (!$model) {
            return '无效的数据';
        }
        return $model->toArray();
    }
}
