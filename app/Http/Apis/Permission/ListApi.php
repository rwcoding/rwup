<?php

namespace App\Http\Apis\Permission;

use App\Http\Apis\BaseApi;
use App\Models\PermissionModel;

/**
 * @property int page
 * @property int page_size
 * @property string name
 * @property string permission
 * @property int group_id
 * @property int type
 */
class ListApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "page" => "required|numeric|min:1",
            "page_size" => "required|numeric|min:5|max:20",
            "type" => "numeric",
            "group_id" => "numeric",
            "name" => "string|min:1|max:100",
            "permission" => "string|min:1|max:100",
        ];
    }

    public function index(): string|array
    {
        $query = PermissionModel::query();

        if ($this->group_id > 0) {
            $query->where('group_id', $this->group_id);
        }

        if ($this->type > 0) {
            $query->where('type', $this->type);
        }

        if ($this->name) {
            $query->where('name', 'like', '%'.$this->name.'%');
        }

        if ($this->permission) {
            $query->where('permission', 'like', '%'.$this->permission.'%');
        }

        $count = (clone $query)->count();

        $data = $query
            ->select(['id', 'name', 'permission', 'group_id', 'type', 'created_at'])
            ->offset(($this->page - 1) * $this->page_size)
            ->limit($this->page_size)
            ->orderByDesc("id")->get()->toArray();

        return [
            'datas' => $data,
            'count' => $count,
            'page' => $this->page,
            'page_size' => $this->page_size
        ];
    }
}
