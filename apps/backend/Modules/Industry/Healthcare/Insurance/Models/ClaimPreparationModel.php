<?php

namespace App\Backend\Modules\Industry\Healthcare\Insurance\Models;

use App\Backend\Models\BaseModel;

class ClaimPreparationModel extends BaseModel
{
    protected string $table = 'healthcare_insurance_claim_preparation';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
