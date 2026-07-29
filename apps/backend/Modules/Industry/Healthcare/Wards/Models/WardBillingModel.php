<?php

namespace App\Backend\Modules\Industry\Healthcare\Wards\Models;

use App\Backend\Models\BaseModel;

class WardBillingModel extends BaseModel
{
    protected string $table = 'healthcare_wards_ward_billing';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
