<?php

namespace App\Http\Apis\Project;

use App\Http\Apis\BaseApi;
use App\Models\ProjectModel;
use App\Models\UserModel;
use App\Services\ApiService;
use phpDocumentor\Reflection\Project;

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
        $model = ProjectModel::query()
                ->with(['doc'=>function($query) {
                    $query->select(['id', 'name', 'updated_at']);
                }, 'updater'=>function($query) {
                    $query->select(['id', 'name']);
                }])
                ->select(['id', 'name', 'created_at'])
                ->find($this->id);
        if (!$model) {
            return '无效的数据';
        }
        return $model->toArray();
    }
}
