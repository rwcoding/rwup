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
 * @property array<array> $docs
 */
class SyncApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "username" => "required",
            "password" => "required",
            "project" => "required",
            "docs" => "required",
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
        $num = 0;
        foreach ($this->docs as $item) {
            $doc = DocModel::where('project_id', $project->id)
                ->where('sign', $item['sign'])
                ->first();
            if (!$doc) {
                $dirSign = substr($item['sign'], 0, strrpos($item['sign'], '/'));
                $dir = DirectoryModel::whereProjectId($project->id)
                    ->whereSign($dirSign)->first();
                $dirId = $dir ? $dir->id : 0;
                $doc = new DocModel();
                $doc->project_id = $project->id;
                $doc->sign = $item['sign'];
                $doc->directory_id = $dirId;
                $doc->user_id = $user->id;
            }
            $doc->title = $item['title'];
            $doc->stitle = $item['title'];
            if (!empty($item['struct'])) {
                $doc->content = $this->format($item['struct'], $doc);
                $doc->content_json = json_encode($item['struct']);
            } else {
                $doc->content = $item['content'];
            }
            $doc->file_sign = $item['file_sign'];
            $doc->ord = $item['ord'] ?? 10000;
            $doc->save();
            $num++;
        }
        return ['num' => $num];
    }

    private function format(array $data, DocModel $doc): string
    {
        $content = "";
        if (!empty($data['doc_desc'])) {
            $content .= $data['doc_desc'] . "\n";
        }

        $content .= "## 指令 \n ```" . ($data['route'] ?? '') . "``` \n";

        $content .= "## 请求 \n";
        $table = $data['request'];
        if (!empty($table)) {
            $content .= "|参数|类型|必须|最大长度|描述|示例|\n";
            $content .= "|---|---|---|---|---|---|\n";
            foreach ($table as $item) {
                $length = $item['length'] ?? '-';
                $required = $item['required'] ? '是' : '否';
                $content .= "|{$item['name']}|{$item['type']}|{$required}|{$length}|{$item['desc']}|{$item['sample']}|\n";
            }
            $content .= "\n";
        } else {
            $content .= "----\n";
        }

        if (!empty($data['request_desc'])) {
            $content .= $data['request_desc'] . "\n";
        }

        $content .= "## 响应 \n";
        $table = $data['response'];
        if (!empty($table)) {
            $content .= "|参数|类型|必须|最大长度|描述|示例|\n";
            $content .= "|---|---|---|---|---|---|\n";
            foreach ($table as $item) {
                $length = $item['length'] ?? '-';
                $required = $item['required'] ? '是' : '否';
                $content .= "|{$item['name']}|{$item['type']}|{$required}|{$length}|{$item['desc']}|{$item['sample']}|\n";
            }
            $content .= "\n";
        } else {
            $content .= "----\n";
        }

        if (!empty($data['response_desc'])) {
            $content .= $data['response_desc'] . "\n";
        }

        return $content;
    }
}
