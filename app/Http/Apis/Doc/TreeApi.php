<?php

namespace App\Http\Apis\Doc;

use App\Http\Apis\BaseApi;
use App\Models\DirectoryModel;
use App\Models\DocModel;
use App\Models\ProjectModel;
use App\Services\AclService;

/**
 * @property int id
 */
class TreeApi extends BaseApi
{
    private mixed $dirs;
    private mixed $docs;

    public function rules(): array
    {
        return [
            "id" => "required|numeric|min:1",
        ];
    }

    public function index(): string|array
    {
        $project = ProjectModel::find($this->id);
        if (!$project) {
            return '无效的工程';
        }

        if (!AclService::allowReadProject($project, $this->getUser())) {
            return '您没有权限读取该项目';
        }

        $this->dirs = DirectoryModel::where('project_id', $this->id)
            ->orderByDesc('ord')->get()->toArray();
        $this->docs = DocModel::where('project_id', $this->id)
            ->orderByDesc('ord')->get()->toArray();

        return [
            'project' => $project->setVisible(['id', 'name', 'sname']),
            'datas' => $this->getTree(),
        ];
    }

    private function getTree(int $pid = 0): array
    {
        $result = [];
        foreach ($this->dirs as $dir) {
            if ($dir['pid'] == $pid) {
                $children = $this->getTree($dir['id']);
                $result[] = [
                    'id' => $dir['id'],
                    'title' => $dir['name'],
                    'type' => 1,
                    'open' => false,
                    'children' => $children,
                ];
            }
        }
        foreach ($this->docs as $v) {
            if ($v['directory_id'] == $pid) {
                $result[] = [
                    'id' => $v['id'],
                    'title' => $v['stitle'] ?: $v['title'],
                    'type' => 2,
                    'open' => false,
                    'children' => [],
                ];
            }
        }
        return $result;
    }
}
