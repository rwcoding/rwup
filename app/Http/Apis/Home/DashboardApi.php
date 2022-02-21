<?php

namespace App\Http\Apis\Home;

use App\Http\Apis\BaseApi;
use App\Models\ProjectModel;

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
            $query->whereRaw("FIND_IN_SET(?,allow_read)", $user->id);
        }
        $count = (clone $query)->count();
        $data = $query
            ->with(['doc'=>function($query) {
                $query->select(['id', 'name', 'updated_at']);
            }, 'updater'=>function($query) {
                $query->select(['id', 'name']);
            }])
            ->select(['id', 'doc_id', 'doc_updater', 'name', 'doc_num', 'bug_num', 'test_num', 'created_at'])
            ->limit(1000)
            ->orderBy("ord")
            ->get();

        return [
            'datas' => $data,
            'count' => $count,
            'page' => $this->page,
            'page_size' => $this->page_size
        ];
    }
}
