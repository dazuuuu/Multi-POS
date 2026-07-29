<?php

namespace App\Backend\Modules\Industry\Healthcare\Laboratory\Models;

use App\Backend\Models\BaseModel;

class ResultVerificationModel extends BaseModel
{
    protected string $table = 'healthcare_laboratory_result_verification';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
