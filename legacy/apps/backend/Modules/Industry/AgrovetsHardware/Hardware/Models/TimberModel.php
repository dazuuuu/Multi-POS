<?php

namespace App\Backend\Modules\Industry\AgrovetsHardware\Hardware\Models;

use App\Backend\Models\BaseModel;

class TimberModel extends BaseModel
{
    protected string $table = 'agrovets_hardware_hardware_timber';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
