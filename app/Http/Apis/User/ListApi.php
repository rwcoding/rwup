<?php

namespace App\Http\Apis\User;

use App\Http\Apis\BaseApi;
use App\Models\UserModel;

/**
 * @property int page
 * @property int page_size
 * @property string username
 * @property int role_id
 */
class ListApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "page"      => "required|numeric|min:1",
            "page_size" => "required|numeric|min:5|max:50",
            "username"  => "string|min:5|max:20",
        ];
    }

    public function index(): string|array
    {
        $query = UserModel::query();
        if ($this->username) {
            $query->where('username', 'like', trim($this->username));
        }
        if ($this->role_id) {
            $query->whereRaw("FIND_IN_SET(?,roles)", $this->role_id);
        }
        $count = (clone $query)->count();
        $data = $query
            ->select(['id', 'username', 'name', 'phone', 'roles', 'status', 'is_super', 'ip', 'created_at'])
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
