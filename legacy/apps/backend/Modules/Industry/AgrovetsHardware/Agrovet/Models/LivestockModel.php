<?php

namespace App\Backend\Modules\Industry\AgrovetsHardware\Agrovet\Models;

use App\Backend\Models\BaseModel;

class LivestockModel extends BaseModel
{
    protected string $table = 'agrovets_hardware_agrovet_livestock';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
