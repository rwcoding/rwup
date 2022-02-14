<?php

namespace App\Http\Apis\User;

use App\Http\Apis\BaseApi;
use App\Models\UserModel;
use App\Services\ApiService;

/**
 * @property int id
 */
class DelApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "id" => "required|numeric|min:1",
        ];
    }

    public function index(): string|array
    {
        $model = UserModel::find($this->id);
        if (!$model) {
            return '无效的数据';
        }
        if ($model->id == 1) {
            return '该用户无法删除';
        }
        if ($model->is_super && $this->getUser()->id != 1) {
            return '该用户无法删除';
        }
        if (!$model->delete()) {
            return '删除失败';
        }
        return ApiService::success();
    }
}
