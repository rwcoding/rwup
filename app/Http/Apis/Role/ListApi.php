<?php

namespace App\Http\Apis\Role;

use App\Http\Apis\BaseApi;
use App\Models\RoleModel;

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
        $data = RoleModel::select("id, name")
            ->offset(($this->page - 1) * $this->page_size)
            ->limit($this->page_size)
            ->orderBy("id")->get()->toArray();

        $count = RoleModel::count();

        return [
            'datas' => $data,
            'count' => $count,
            'page' => $this->page,
            'page_size' => $this->page_size
        ];
    }
}
