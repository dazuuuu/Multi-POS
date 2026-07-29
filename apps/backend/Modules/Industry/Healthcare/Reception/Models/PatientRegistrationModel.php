<?php

namespace App\Backend\Modules\Industry\Healthcare\Reception\Models;

use App\Backend\Models\BaseModel;

class PatientRegistrationModel extends BaseModel
{
    protected string $table = 'healthcare_reception_patient_registration';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
