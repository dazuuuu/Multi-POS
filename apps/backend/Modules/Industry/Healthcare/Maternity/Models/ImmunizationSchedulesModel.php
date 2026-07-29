<?php

namespace App\Backend\Modules\Industry\Healthcare\Maternity\Models;

use App\Backend\Models\BaseModel;

class ImmunizationSchedulesModel extends BaseModel
{
    protected string $table = 'healthcare_maternity_immunization_schedules';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
