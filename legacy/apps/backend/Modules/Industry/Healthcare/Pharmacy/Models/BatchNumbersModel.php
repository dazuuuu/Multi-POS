<?php

namespace App\Backend\Modules\Industry\Healthcare\Pharmacy\Models;

use App\Backend\Models\BaseModel;

class BatchNumbersModel extends BaseModel
{
    protected string $table = 'healthcare_pharmacy_batch_numbers';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
