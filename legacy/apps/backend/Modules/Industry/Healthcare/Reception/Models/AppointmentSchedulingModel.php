<?php

namespace App\Backend\Modules\Industry\Healthcare\Reception\Models;

use App\Backend\Models\BaseModel;

class AppointmentSchedulingModel extends BaseModel
{
    protected string $table = 'healthcare_reception_appointment_scheduling';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
