<?php

namespace App\Backend\Modules\Industry\Healthcare\Maternity\Models;

use App\Backend\Models\BaseModel;

class DeliveryRecordsModel extends BaseModel
{
    protected string $table = 'healthcare_maternity_delivery_records';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
