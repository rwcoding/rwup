<?php

namespace App\Http\Apis\Log;

use App\Http\Apis\BaseApi;
use App\Models\LogModel;
use App\Models\UserModel;

/**
 * @property int page
 * @property int page_size
 * @property int type
 * @property int username
 * @property int target
 */
class ListApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "page"      => "required|numeric|min:1",
            "page_size" => "required|numeric|min:5|max:20",
            "type"      => "required|numeric|min:1",
            "username"  => "required|string|min:5|max:30",
            "target"    => "required|numeric|min:1",
        ];
    }

    public function index(): string|array
    {
        $where = [];
        if ($this->username) {
            $user = UserModel::whereUsername($this->username)->first();
            if (!$user) {
                return [
                    'datas' => [],
                    'count' => 0,
                    'page'      => $this->page,
                    'page_size' => $this->page_size
                ];
            }
            $where[] = ['user_id', '=', $user->id];
        }

        if ($this->type) {
            $where[] = ['type', '=', $this->type];
        }

        if ($this->target) {
            $where[] = ['target', '=', $this->target];
        }

        $data = LogModel::where($where)
            ->select(['id', 'user_id', 'type', 'msg', 'target', 'ip', 'created_at'])
            ->offset(($this->page - 1) * $this->page_size)
            ->limit($this->page_size)
            ->orderBy("id")->get()->toArray();

        $count = LogModel::where($where)->count();

        return [
            'datas'     => $data,
            'count'     => $count,
            'page'      => $this->page,
            'page_size' => $this->page_size
        ];
    }
}
