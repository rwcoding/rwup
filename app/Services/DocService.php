<?php

namespace App\Services;

use App\Models\DocLogModel;
use App\Models\DocModel;

class DocService
{
    public static function log(DocModel $doc, int $userId): bool
    {
        $log = new DocLogModel();
        $log->doc_id = $doc->id;
        $log->user_id = $userId;
        $log->name = $doc->name;
        $log->sname = $doc->sname;
        $log->content = $doc->content;
        return $log->save();
    }
}
