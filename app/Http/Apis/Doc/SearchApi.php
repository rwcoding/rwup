<?php

namespace App\Http\Apis\Doc;

use App\Http\Apis\BaseApi;
use App\Models\DocModel;

/**
 * @property int project_id
 * @property string key
 */
class SearchApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "project_id" => "required|numeric|min:1",
            "key" => "required",
        ];
    }

    public function index(): string|array
    {
        $query = DocModel::query();
        if ($this->project_id) {
            $query->where('project_id', $this->project_id);
        }
        if ($this->key) {
            //$query->where('title', 'like', '%' . $this->key . '%');
            $query->where('content', 'like', '%' . $this->key . '%');
        }
        $data = $query
            ->select([
                'id', 'title', 'stitle', 'ord'])
            ->orderByDesc("ord")
            ->limit(1000)
            ->get();

        return [
            'datas' => $data
        ];
    }
}
