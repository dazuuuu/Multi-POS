<?php

namespace App\Backend\Modules\Industry\Healthcare\Billing\Models;

use App\Backend\Models\BaseModel;

class CreditBillingModel extends BaseModel
{
    protected string $table = 'healthcare_billing_credit_billing';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
