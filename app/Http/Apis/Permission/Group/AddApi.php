<?php

namespace App\Http\Apis\Permission\Group;

use App\Http\Apis\BaseApi;
use App\Models\PermissionGroupModel;
use App\Models\PermissionModel;
use App\Services\ApiService;

/**
 * @property string name
 * @property int ord
 * @property int id
 */
class AddApi extends BaseApi
{
    protected bool $isAdd = true;

    public function rules(): array
    {
        $rules = [
            "name" => "required|min:2|max:100",
            "ord"  => "required|numeric|min:0",
        ];
        if (!$this->isAdd) {
            $rules['id'] =  "required|numeric|min:1";
        }
        return $rules;
    }

    public function index(): string|array
    {
        if (!$this->isAdd) {
            $model = PermissionGroupModel::find($this->id);
            if (!$model) {
                return ApiService::failure("无效的数据");
            }
        } else {
            $model = new PermissionGroupModel();
        }
        $model->name = trim($this->name);
        $model->ord = $this->ord;
        if (!$model->save()) {
            return ApiService::failure('保存失败');
        }
        return ['id' => $model->id];
    }
}
