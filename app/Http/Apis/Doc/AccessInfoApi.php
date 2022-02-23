<?php

namespace App\Http\Apis\Doc;

use App\Http\Apis\BaseApi;
use App\Models\DocMemberModel;
use App\Models\DocModel;

/**
 * @property int id
 */
class AccessInfoApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "id" => "required|numeric|min:1",
        ];
    }

    public function index(): string|array
    {
        $model = DocModel::find($this->id);
        if (!$model) {
            return '无效的数据';
        }
        $users = [];
        $dmm = DocMemberModel::query()
            ->with(['user'=>function($query) {
                $query->select(['id', 'name', 'username']);
            }])
            ->where('doc_id', $this->id)->get();
        foreach ($dmm as $item) {
            if (!$item->user) {
                continue;
            }
            if (!isset($users[$item->type])) {
                $users[$item->type] = [];
            }
            $users[$item->type][] = $item->user->username;
        }
        return [
            'rw' => ['value' => $model->is_rw, 'users' => $users['rw'] ?? []],
            'ww' => ['value' => $model->is_ww, 'users' => $users['ww'] ?? []],
            'rb' => ['value' => $model->is_rb, 'users' => $users['rb'] ?? []],
            'wb' => ['value' => $model->is_wb, 'users' => $users['wb'] ?? []],
        ];
    }
}
