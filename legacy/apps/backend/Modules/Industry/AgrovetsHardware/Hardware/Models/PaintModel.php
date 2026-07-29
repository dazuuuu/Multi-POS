<?php

namespace App\Backend\Modules\Industry\AgrovetsHardware\Hardware\Models;

use App\Backend\Models\BaseModel;

class PaintModel extends BaseModel
{
    protected string $table = 'agrovets_hardware_hardware_paint';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
