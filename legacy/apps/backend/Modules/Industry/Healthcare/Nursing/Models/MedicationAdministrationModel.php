<?php

namespace App\Backend\Modules\Industry\Healthcare\Nursing\Models;

use App\Backend\Models\BaseModel;

class MedicationAdministrationModel extends BaseModel
{
    protected string $table = 'healthcare_nursing_medication_administration';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
