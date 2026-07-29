<?php

namespace App\Backend\Modules\Industry\AgrovetsHardware\Hardware\Models;

use App\Backend\Models\BaseModel;

class PlumbingModel extends BaseModel
{
    protected string $table = 'agrovets_hardware_hardware_plumbing';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
