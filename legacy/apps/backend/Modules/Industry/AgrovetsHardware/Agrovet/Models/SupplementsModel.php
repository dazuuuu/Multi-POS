<?php

namespace App\Backend\Modules\Industry\AgrovetsHardware\Agrovet\Models;

use App\Backend\Models\BaseModel;

class SupplementsModel extends BaseModel
{
    protected string $table = 'agrovets_hardware_agrovet_supplements';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
