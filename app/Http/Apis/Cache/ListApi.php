<?php

namespace App\Http\Apis\Cache;

use App\Http\Apis\BaseApi;
use App\Models\CacheModel;

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
            "page"      => "required|numeric|min:1",
            "page_size" => "required|numeric|min:5|max:20",
            "key"       => "string|min:1|max:100",
        ];
    }

    public function index(): string|array
    {
        $where = [];
        if ($this->key) {
            $where[] = ['k', '=', $this->key];
        }

        $data = CacheModel::where($where)
            ->select(['id', 'name', 'k', 'expire', 'created_at'])
            ->offset(($this->page - 1) * $this->page_size)
            ->limit($this->page_size)
            ->orderBy("id")->get()->toArray();

        $count = CacheModel::where($where)->count();

        return [
            'datas'     => $data,
            'count'     => $count,
            'page'      => $this->page,
            'page_size' => $this->page_size
        ];
    }
}
