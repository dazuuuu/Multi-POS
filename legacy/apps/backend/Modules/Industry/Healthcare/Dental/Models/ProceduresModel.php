<?php

namespace App\Backend\Modules\Industry\Healthcare\Dental\Models;

use App\Backend\Models\BaseModel;

class ProceduresModel extends BaseModel
{
    protected string $table = 'healthcare_dental_procedures';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
