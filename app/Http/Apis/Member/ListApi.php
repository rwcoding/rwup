<?php

namespace App\Http\Apis\Member;

use App\Http\Apis\BaseApi;
use App\Models\ProjectMemberModel;

/**
 * @property int page
 * @property int page_size
 * @property int project_id
 */
class ListApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "project_id" => "required|numeric|min:1",
            "page"      => "required|numeric|min:1",
            "page_size" => "required|numeric|min:5|max:20",
        ];
    }

    public function index(): string|array
    {
        $query = ProjectMemberModel::query();
        $query->where('project_id', $this->project_id);
        $count = (clone $query)->count();
        $data = $query
            ->with(['user'=>function($query) {
               $query->select(['id', 'username', 'name']);
            }])
            ->select(['id', 'user_id', 'project_id', 'doc_read', 'doc_write',
                'test_read','test_write', 'bug_read', 'bug_write', 'manage'])
            ->offset(($this->page - 1) * $this->page_size)
            ->limit($this->page_size)
            ->orderByDesc("id")
            ->get();

        return [
            'datas' => $data,
            'count' => $count,
            'page' => $this->page,
            'page_size' => $this->page_size
        ];
    }
}
