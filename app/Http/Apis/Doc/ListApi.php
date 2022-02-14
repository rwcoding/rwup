<?php

namespace App\Http\Apis\Doc;

use App\Http\Apis\BaseApi;
use App\Models\DocModel;

/**
 * @property int page
 * @property int page_size
 * @property int project_id
 * @property int directory_id
 */
class ListApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "page"      => "required|numeric|min:1",
            "page_size" => "required|numeric|min:5|max:20",
            "project_id" => "numeric|min:1",
            "directory_id" => "numeric|min:1",
        ];
    }

    public function index(): string|array
    {
        $query = DocModel::query();
        if ($this->project_id) {
            $query->where('project_id', $this->project_id);
        }
        if ($this->directory_id) {
            $query->where('directory_id', $this->directory_id);
        }
        $count = (clone $query)->count();
        $data = $query
            ->select(['id', 'name', 'sname', 'is_share', 'share_code', 'created_at'])
            ->offset(($this->page - 1) * $this->page_size)
            ->limit($this->page_size)
            ->orderByDesc("ord")
            ->get();

        return [
            'datas' => $data,
            'count' => $count,
            'page' => $this->page,
            'page_size' => $this->page_size
        ];
    }
}
