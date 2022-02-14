<?php

namespace App\Http\Apis\Directory;

use App\Http\Apis\BaseApi;
use App\Models\DirectoryModel;

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
        $model = DirectoryModel::query()
                ->select(['id', 'name', 'pid', 'ord'])
                ->find($this->id);
        if (!$model) {
            return '无效的数据';
        }
        return $model->toArray();
    }
}
