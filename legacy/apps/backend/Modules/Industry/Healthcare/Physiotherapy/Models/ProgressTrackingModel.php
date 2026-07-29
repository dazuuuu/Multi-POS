<?php

namespace App\Backend\Modules\Industry\Healthcare\Physiotherapy\Models;

use App\Backend\Models\BaseModel;

class ProgressTrackingModel extends BaseModel
{
    protected string $table = 'healthcare_physiotherapy_progress_tracking';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
