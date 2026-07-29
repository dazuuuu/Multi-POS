<?php

namespace App\Backend\Modules\Industry\Healthcare\Doctor\Models;

use App\Backend\Models\BaseModel;

class ConsultationNotesModel extends BaseModel
{
    protected string $table = 'healthcare_doctor_consultation_notes';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
