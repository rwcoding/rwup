<?php

namespace App\Http\Apis\Permission;

use App\Http\Apis\BaseApi;
use App\Models\PermissionModel;
use App\Services\ApiService;

/**
 * @property string permission
 * @property string name
 * @property int group_id
 * @property int type
 * @property int id
 */
class AddApi extends BaseApi
{
    protected bool $isAdd = true;

    public function rules(): array
    {
        $rules = [
            "name"       => "required|min:2|max:100",
            "permission" => "required|min:2|max:100",
            "group_id"   => "required|numeric|min:1",
            "type"       => "required|numeric|min:1",
        ];
        if (!$this->isAdd) {
            $rules['id'] =  "required|numeric|min:1";
        }
        return $rules;
    }

    public function index(): string|array
    {
        if (!$this->isAdd) {
            $model = PermissionModel::find($this->id);
            if (!$model) {
                return ApiService::failure("无效的数据");
            }
        } else {
            $model = new PermissionModel();
        }
        $model->name = trim($this->name);
        $model->permission = trim($this->permission);
        $model->group_id = $this->group_id;
        $model->type = $this->type;
        if (!$model->save()) {
            return ApiService::failure('保存失败');
        }
        return ['id' => $model->id];
    }
}
