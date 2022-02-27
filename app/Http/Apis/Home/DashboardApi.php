<?php

namespace App\Http\Apis\Home;

use App\Http\Apis\BaseApi;
use App\Models\ProjectModel;
use App\Models\ProjectMemberModel;

/**
 * @property int page
 * @property int page_size
 */
class DashboardApi extends BaseApi
{
    public function index(): string|array
    {
        $user = $this->getUser();
        $query = ProjectModel::query();
        if (!$user->isSuper()) {
            $projectIdList = ProjectMemberModel::query()
                ->select('user_id')
                ->where('doc_read', 1)
                ->where('user_id', $user->id)
                ->pluck('project_id');
            if (!$projectIdList) {
                return ['datas' => []];
            } else {
                $query->whereIn('id', $projectIdList);
            }
        }
        $count = (clone $query)->count();
        $data = $query
            ->with(['doc' => function ($query) {
                $query->select(['id', 'title', 'updated_at']);
            }, 'updater' => function ($query) {
                $query->select(['id', 'name']);
            }])
            ->select(['id', 'doc_id', 'doc_updater', 'name', 'doc_num', 'bug_num', 'test_num', 'created_at'])
            ->limit(1000)
            ->orderBy("ord")
            ->get();

        return [
            'datas' => $data,
        ];
    }
}
