<?php

namespace App\Http\Apis\User;

use App\Http\Apis\BaseApi;
use App\Models\UserModel;
use App\Services\UserService;

/**
 * @property string username
 * @property string password
 * @property string name
 * @property string phone
 * @property array<int> roles
 * @property int status
 * @property int is_super
 * @property int id
 */
class AddApi extends BaseApi
{
    protected bool $isAdd = true;

    public function rules(): array
    {
        $rules = [
            "username" => "required|regex:/^[a-z0-9A-Z_-]{5,20}$/",
            "password" => "required|max:50",
            "name"     => "required|min:2|max:20",
            "phone"    => "min:7",
            "roles"    => "array",
            "status"   => "required|numeric|min:1",
            "is_super" => "required|numeric|max:1",
        ];
        if (!$this->isAdd) {
            $rules['id'] = "required|numeric|min:1";
            unset($rules['username']);
            $rules['password'] = "max:50";
        }
        return $rules;
    }

    public function index(): string|array
    {
        if (!$this->isAdd) {
            $model = UserModel::find($this->id);
            if (!$model) {
                return '无效的数据';
            }
        } else {
            $model = new UserModel();
            $model->username = $this->username;
        }

        if ($this->password) {
            $model->salt = UserService::createSalt();
            $model->password = UserService::createPassword($this->password, $model->salt);
        }

        $model->name = $this->name;
        $model->phone = $this->phone;
        $model->roles = $this->roles ? implode(',', $this->roles) : '';
        $model->status = $this->status;
        if ($this->getUser()->id == 1) {
            $model->is_super = $this->is_super;
        }
        $model->ip = $this->getRequest()->ip() ?? '';

        if (!$model->save()) {
            return '保存失败';
        }
        return ['id' => $model->id];
    }
}
