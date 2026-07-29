<?php

namespace App\Backend\Modules\Industry\AgrovetsHardware\Services\Models;

use App\Backend\Models\BaseModel;

class PaintMixingModel extends BaseModel
{
    protected string $table = 'agrovets_hardware_services_paint_mixing';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
