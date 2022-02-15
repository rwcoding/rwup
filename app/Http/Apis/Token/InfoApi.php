<?php

namespace App\Http\Apis\Token;

use App\Http\Apis\BaseApi;
use App\Models\TokenModel;
use App\Services\ApiService;

/**
 * @property int id
 */
class InfoApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "id" => "required|numeric|min:1",
        ];
    }

    public function index(): string|array
    {
        $model = TokenModel::with(['user' => function ($query) {
            $query->select(['id', 'name', 'username']);
        }])
            ->select(["id", "user_id", "platform", "token", "expire", "created_at"])
            ->find($this->id);
        if (!$model) {
            return '无效的数据';
        }
        return $model->toArray();
    }
}
