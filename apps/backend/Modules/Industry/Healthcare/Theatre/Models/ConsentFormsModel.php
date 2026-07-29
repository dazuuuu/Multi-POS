<?php

namespace App\Backend\Modules\Industry\Healthcare\Theatre\Models;

use App\Backend\Models\BaseModel;

class ConsentFormsModel extends BaseModel
{
    protected string $table = 'healthcare_theatre_consent_forms';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
