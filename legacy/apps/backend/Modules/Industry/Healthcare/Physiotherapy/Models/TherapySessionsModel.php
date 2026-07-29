<?php

namespace App\Backend\Modules\Industry\Healthcare\Physiotherapy\Models;

use App\Backend\Models\BaseModel;

class TherapySessionsModel extends BaseModel
{
    protected string $table = 'healthcare_physiotherapy_therapy_sessions';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
