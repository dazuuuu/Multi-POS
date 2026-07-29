<?php

namespace App\Backend\Modules\Industry\Healthcare\Pharmacy\Models;

use App\Backend\Models\BaseModel;

class ExpiryTrackingModel extends BaseModel
{
    protected string $table = 'healthcare_pharmacy_expiry_tracking';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
