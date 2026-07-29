<?php

namespace App\Backend\Modules\Industry\Healthcare\Pharmacy\Models;

use App\Backend\Models\BaseModel;

class PrescriptionDispensingModel extends BaseModel
{
    protected string $table = 'healthcare_pharmacy_prescription_dispensing';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
