<?php

namespace App\Http\Apis\Directory;

use App\Http\Apis\BaseApi;
use App\Models\DirectoryModel;

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
            "project_id" => "numeric|min:1",
        ];
    }

    public function index(): string|array
    {
        $query = DirectoryModel::query();
        if ($this->project_id) {
            $query->where('project_id', $this->project_id);
        }
        $count = (clone $query)->count();
        $data = $query
            ->select(['id', 'name', 'sign', 'pid', 'ord', 'created_at'])
            ->orderByDesc("ord")
            ->get();

        return [
            'datas' => $data,
            'count' => $count,
        ];
    }
}
