<?php

namespace App\Backend\Modules\Industry\Healthcare\Reception\Models;

use App\Backend\Models\BaseModel;

class WalkInRegistrationModel extends BaseModel
{
    protected string $table = 'healthcare_reception_walk_in_registration';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
