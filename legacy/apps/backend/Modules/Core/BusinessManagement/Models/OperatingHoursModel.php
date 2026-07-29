<?php

namespace App\Backend\Modules\Core\BusinessManagement\Models;

use App\Backend\Models\BaseModel;

class OperatingHoursModel extends BaseModel
{
    protected string $table = 'business_management_operating_hours';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
