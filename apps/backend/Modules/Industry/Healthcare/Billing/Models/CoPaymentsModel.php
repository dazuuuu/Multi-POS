<?php

namespace App\Backend\Modules\Industry\Healthcare\Billing\Models;

use App\Backend\Models\BaseModel;

class CoPaymentsModel extends BaseModel
{
    protected string $table = 'healthcare_billing_co_payments';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
