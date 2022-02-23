<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $project_id
 * @property int $user_id
 * @property int $doc_read
 * @property int $doc_write
 * @property int $test_read
 * @property int $test_write
 * @property int $bug_read
 * @property int $bug_write
 * @property int $manage
 * @property UserModel $user
 * @property ProjectModel $project
 */
class ProjectMemberModel extends BaseModel
{
    protected $table = "project_member";

    public function project(): BelongsTo
    {
        return $this->belongsTo(ProjectModel::class, 'project_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'id');
    }
}
