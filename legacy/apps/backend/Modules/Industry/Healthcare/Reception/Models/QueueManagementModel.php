<?php

namespace App\Backend\Modules\Industry\Healthcare\Reception\Models;

use App\Backend\Models\BaseModel;

class QueueManagementModel extends BaseModel
{
    protected string $table = 'healthcare_reception_queue_management';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
