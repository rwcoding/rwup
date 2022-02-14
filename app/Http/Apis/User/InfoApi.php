<?php

namespace App\Http\Apis\User;

use App\Http\Apis\BaseApi;
use App\Models\UserModel;
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
        $model = UserModel::query()
            ->select(['id', 'username', 'name', 'phone', 'roles', 'status', 'is_super', 'ip', 'created_at'])
            ->find($this->id);
        if (!$model) {
            return '无效的数据';
        }
        return $model->toArray();
    }
}
