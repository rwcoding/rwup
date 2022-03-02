<?php

namespace App\Http\Apis\Open;

use App\Http\Apis\BaseApi;
use App\Models\DirectoryModel;
use App\Models\DocModel;
use App\Models\ProjectModel;
use App\Services\AclService;
use App\Services\UserService;

/**
 * @property string $username
 * @property string $password
 * @property string $project
 * @property array<array> $dirs
 * @property array<array> $files
 */
class SyncCheckApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "username" => "required",
            "password" => "required",
            "project" => "required",
        ];
    }

    public function index(): string|array
    {
        $project = ProjectModel::where('sign', $this->project)->first();
        if (!$project) {
            return '无效的工程';
        }

        $msg = '';
        $user = UserService::verifyPassword($this->username, $this->password, $msg);
        if (!$user) {
            return $msg;
        }

        if (!AclService::allowWriteProject($project, $user)) {
            return '您没有权限';
        }

        $dms = DirectoryModel::where('project_id', $project->id)
            ->where('sign', 'like', '$%')
            ->get();
        $delete = [];
        $update = [];
        $ord = 10000;
        foreach ($dms as $item) {
            $ord++;
            if (!isset($this->dirs[$item->sign])) {
                $delete[] = $item->id;
            } else if (
                $item->name !== $this->dirs[$item->sign] ||
                $item->ord != $ord) {
                $update[$item->id] = [
                    'name' => $this->dirs[$item->sign],
                    'ord' => $item->ord >= 200 ? $item->ord : $ord
                ];
            }
        }
        if ($delete) {
            DirectoryModel::whereIn('id', $delete)->delete();
        }
        if ($update) {
            foreach ($update as $id => $item) {
                DirectoryModel::whereId($id)->update($item);
            }
        }
        $ord = 10000;
        foreach ($this->dirs as $sign => $name) {
            if (str_starts_with($sign, '$')) {
                $sign = substr($sign, 1);
            }
            if (!str_starts_with($sign, '/')) {
                $sign = '/' . $sign;
            }
            if (str_ends_with($sign, '/')) {
                $sign = substr($sign, 0, -1);
            }
            $arr = explode('/', trim($sign));
            if (empty($arr[1])) {
                continue;
            }
            if (!$dms->where('sign', '$/' . $arr[1])->first()) {
                $model = new DirectoryModel();
                $model->name = $this->dirs['$/' . $arr[1]] ?? $arr[1];
                $model->sign = '$/' . $arr[1];
                $model->ord = ++$ord;
                $model->pid = 0;
                $model->project_id = $project->id;
                $model->save();
                $dms->add($model);
            }

            if (isset($arr[2])) {
                if ($p = $dms->where('sign', '$' . $sign)->first()) {
                    $model = new DirectoryModel();
                    $model->name = $name;
                    $model->sign = '$' . $sign;
                    $model->ord = ++$ord;
                    $model->pid = $p->id;
                    $model->project_id = $project->id;
                    $dms->add($model);
                }
            }
        }

        // 检测文件
        $dms = DocModel::where('project_id', $project->id)
            ->where('sign', 'like', '$%')
            ->get();

        $delete = [];
        $insert = [];
        $has = [];
        foreach ($dms as $item) {
            $has[] = $item->sign;
            if (!isset($this->files[$item->sign])) {
                $delete[] = $item->id;
            } else if ($this->files[$item->sign]['md5'] != $item->file_sign) {
                $insert[] = $this->files[$item->sign]['file'];
            } else if ($this->files[$item->sign]['title'] != $item->title) {
                DocModel::whereId($item->id)->update([
                    'title' => $this->files[$item->sign]['title'],
                    'stitle' => $this->files[$item->sign]['title']
                ]);
            }
        }
        foreach ($this->files as $sign => $item) {
            if (!in_array($sign, $has)) {
                $insert[] = $item['file'];
            }
        }
        if ($delete) {
            DocModel::whereIn('id', $delete)->delete();
        }

        return ['files' => $insert];
    }
}
