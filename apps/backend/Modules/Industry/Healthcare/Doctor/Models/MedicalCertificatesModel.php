<?php

namespace App\Backend\Modules\Industry\Healthcare\Doctor\Models;

use App\Backend\Models\BaseModel;

class MedicalCertificatesModel extends BaseModel
{
    protected string $table = 'healthcare_doctor_medical_certificates';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
