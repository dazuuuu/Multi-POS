<?php

namespace App\Backend\Modules\Industry\Healthcare\Physiotherapy\Models;

use App\Backend\Models\BaseModel;

class ExercisePlansModel extends BaseModel
{
    protected string $table = 'healthcare_physiotherapy_exercise_plans';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
