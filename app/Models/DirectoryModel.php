<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $name 名称
 * @property int $project_id 工程
 * @property int $ord 排序
 * @property ProjectModel $project
 */
class DirectoryModel extends BaseModel
{
    protected $table = "doc";

    public function project(): BelongsTo
    {
        return $this->belongsTo(ProjectModel::class, 'project_id', 'id');
    }
}
