<?php

namespace App\Backend\Modules\Industry\AgrovetsHardware\Equipment\Models;

use App\Backend\Models\BaseModel;

class MachineryModel extends BaseModel
{
    protected string $table = 'agrovets_hardware_equipment_machinery';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
