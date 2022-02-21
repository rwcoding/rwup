<?php

namespace App\Http\Apis\Log;

use App\Http\Apis\BaseApi;
use App\Models\LogModel;
use App\Models\UserModel;
use App\Services\LogService;

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
            "page" => "required|numeric|min:1",
            "page_size" => "required|numeric|min:5|max:20",
            "type" => "numeric|min:0",
            "username" => "string|min:5|max:30",
            "target" => "numeric|min:0",
        ];
    }

    public function index(): string|array
    {
        $query = LogModel::query();
        if ($this->username) {
            $user = UserModel::whereUsername($this->username)->first();
            if (!$user) {
                return [
                    'datas' => [],
                    'count' => 0,
                    'page' => $this->page,
                    'page_size' => $this->page_size,
                    'types' => LogService::typeNames()
                ];
            }
            $query->where('user_id', $user->id);
        }

        if ($this->type) {
            $query->where('type', $this->type);
        }

        if ($this->target) {
            $query->where('target', $this->target);
        }

        $count = (clone $query)->count();

        $data = $query
            ->with(['user'=>function($query) {
                $query->select(['id', 'name']);
            }])
            ->select(['id', 'user_id', 'type', 'msg', 'target', 'ip', 'created_at'])
            ->offset(($this->page - 1) * $this->page_size)
            ->limit($this->page_size)
            ->orderByDesc("id")->get()->toArray();

        return [
            'datas' => $data,
            'count' => $count,
            'page' => $this->page,
            'page_size' => $this->page_size,
            'types' => LogService::typeNames()
        ];
    }
}
