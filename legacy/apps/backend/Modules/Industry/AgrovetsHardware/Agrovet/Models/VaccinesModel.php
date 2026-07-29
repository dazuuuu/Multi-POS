<?php

namespace App\Backend\Modules\Industry\AgrovetsHardware\Agrovet\Models;

use App\Backend\Models\BaseModel;

class VaccinesModel extends BaseModel
{
    protected string $table = 'agrovets_hardware_agrovet_vaccines';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
