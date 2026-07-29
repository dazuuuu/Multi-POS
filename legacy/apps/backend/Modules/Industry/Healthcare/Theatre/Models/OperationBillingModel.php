<?php

namespace App\Backend\Modules\Industry\Healthcare\Theatre\Models;

use App\Backend\Models\BaseModel;

class OperationBillingModel extends BaseModel
{
    protected string $table = 'healthcare_theatre_operation_billing';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
