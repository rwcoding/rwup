<?php

namespace App\Http\Apis\Config;

use App\Http\Apis\BaseApi;
use App\Models\ConfigModel;
use App\Services\ConfigService;

/**
 * @property int page
 * @property int page_size
 * @property string key
 */
class ListApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "page" => "required|numeric|min:1",
            "page_size" => "required|numeric|min:5|max:20",
            "key" => "string|min:1|max:100",
        ];
    }

    public function index(): string|array
    {
        $query = ConfigModel::query();
        if ($this->key) {
            $query->where("k", $this->key);
        }

        $count = (clone $query)->count();

        $data = $query
            ->select(['id', 'name', 'k', 'v', 'data_type', 'created_at'])
            ->offset(($this->page - 1) * $this->page_size)
            ->limit($this->page_size)
            ->orderBy("id")->get()->toArray();

        return [
            'datas' => $data,
            'count' => $count,
            'page' => $this->page,
            'page_size' => $this->page_size,
            'types' => ConfigService::typeNames()
        ];
    }
}
