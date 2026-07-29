<?php

namespace App\Backend\Modules\Industry\Healthcare\Dental\Models;

use App\Backend\Models\BaseModel;

class DentalChartingModel extends BaseModel
{
    protected string $table = 'healthcare_dental_dental_charting';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
