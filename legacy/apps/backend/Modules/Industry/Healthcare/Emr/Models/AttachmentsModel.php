<?php

namespace App\Backend\Modules\Industry\Healthcare\Emr\Models;

use App\Backend\Models\BaseModel;

class AttachmentsModel extends BaseModel
{
    protected string $table = 'healthcare_emr_attachments';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
