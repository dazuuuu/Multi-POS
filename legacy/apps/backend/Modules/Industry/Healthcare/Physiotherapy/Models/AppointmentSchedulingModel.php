<?php

namespace App\Backend\Modules\Industry\Healthcare\Physiotherapy\Models;

use App\Backend\Models\BaseModel;

class AppointmentSchedulingModel extends BaseModel
{
    protected string $table = 'healthcare_physiotherapy_appointment_scheduling';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
