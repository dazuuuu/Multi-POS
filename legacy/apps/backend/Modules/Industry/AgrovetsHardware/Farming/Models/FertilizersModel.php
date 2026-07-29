<?php

namespace App\Backend\Modules\Industry\AgrovetsHardware\Farming\Models;

use App\Backend\Models\BaseModel;

class FertilizersModel extends BaseModel
{
    protected string $table = 'agrovets_hardware_farming_fertilizers';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
