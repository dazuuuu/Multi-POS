<?php

namespace App\Backend\Modules\Industry\AgrovetsHardware\Hardware\Models;

use App\Backend\Models\BaseModel;

class ElectricalModel extends BaseModel
{
    protected string $table = 'agrovets_hardware_hardware_electrical';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
