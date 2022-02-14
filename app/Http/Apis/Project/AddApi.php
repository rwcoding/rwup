<?php

namespace App\Http\Apis\Project;

use App\Http\Apis\BaseApi;
use App\Models\ProjectModel;
use App\Services\UserService;

/**
 * @property string name
 * @property array<int> manager
 * @property array<int> allow_read
 * @property array<int> allow_write
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
            "user_manage" => "array",
            "allow_read" => "array",
            "allow_write" => "array",
            "ord" => "required|numeric|min:1",
        ];
        if (!$this->isAdd) {
            $rules['id'] = "required|numeric|min:1";
        }
        return $rules;
    }

    public function index(): string|array
    {
        if (!$this->isAdd) {
            $model = ProjectModel::find($this->id);
            if (!$model) {
                return '无效的数据';
            }
        } else {
            $model = new ProjectModel();
        }

        $model->name = $this->name;
        $model->manager = $this->manager ? implode(',', $this->manager) : '';
        $model->allow_read = $this->allow_read ? implode(',', $this->allow_read) : '';
        $model->allow_write = $this->allow_write ? implode(',', $this->allow_write) : '';
        $model->ord = $this->ord;

        if (!$model->save()) {
            return '保存失败';
        }
        return ['id' => $model->id];
    }
}
