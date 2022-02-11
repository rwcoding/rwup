<?php

namespace App\Http\Apis\Token;

use App\Http\Apis\BaseApi;
use App\Models\TokenModel;
use App\Models\UserModel;

/**
 * @property int page
 * @property int page_size
 * @property string username
 */
class ListApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "page" => "required|numeric|min:1",
            "page_size" => "required|numeric|min:5|max:20",
            "username" => "string|min:5|max:20",
        ];
    }

    public function index(): string|array
    {
        $query = TokenModel::query();
        if ($this->username) {
            $user = UserModel::whereUsername($this->username)->first();
            if (!$user) {
                return [
                    'datas' => [],
                    'count' => 0,
                    'page' => $this->page,
                    'page_size' => $this->page_size
                ];
            }
            $query->where('user_id', $user->id);
        }

        $count = (clone $query)->count();

        $data = $query->with([
                'user' => function ($query) {
                    $query->select(['id', 'name', 'username']);
                }
            ])
            ->select(['id', 'platform', 'token', 'expire', 'created_at'])
            ->offset(($this->page - 1) * $this->page_size)
            ->limit($this->page_size)
            ->orderBy("id")->get()->toArray();

        return [
            'datas' => $data,
            'count' => $count,
            'page' => $this->page,
            'page_size' => $this->page_size
        ];
    }
}
