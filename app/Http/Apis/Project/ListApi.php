<?php

namespace App\Http\Apis\Project;

use App\Http\Apis\BaseApi;
use App\Models\ProjectModel;

/**
 * @property int page
 * @property int page_size
 */
class ListApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "page"      => "required|numeric|min:1",
            "page_size" => "required|numeric|min:5|max:20",
        ];
    }

    public function index(): string|array
    {
        $query = ProjectModel::query();
        $count = (clone $query)->count();
        $data = $query
            ->with(['doc'=>function($query) {
                $query->select(['id', 'name', 'updated_at']);
            }, 'updater'=>function($query) {
                $query->select(['id', 'name']);
            }])
            ->select(['id', 'doc_id', 'doc_updater', 'name', 'doc_num', 'bug_num', 'test_num', 'created_at'])
            ->offset(($this->page - 1) * $this->page_size)
            ->limit($this->page_size)
            ->orderBy("ord")
            ->get();

        return [
            'datas' => $data,
            'count' => $count,
            'page' => $this->page,
            'page_size' => $this->page_size
        ];
    }
}
