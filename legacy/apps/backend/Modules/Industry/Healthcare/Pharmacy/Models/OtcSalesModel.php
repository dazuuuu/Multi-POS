<?php

namespace App\Backend\Modules\Industry\Healthcare\Pharmacy\Models;

use App\Backend\Models\BaseModel;

class OtcSalesModel extends BaseModel
{
    protected string $table = 'healthcare_pharmacy_otc_sales';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
