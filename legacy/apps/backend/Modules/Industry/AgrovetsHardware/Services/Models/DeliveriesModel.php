<?php

namespace App\Backend\Modules\Industry\AgrovetsHardware\Services\Models;

use App\Backend\Models\BaseModel;

class DeliveriesModel extends BaseModel
{
    protected string $table = 'agrovets_hardware_services_deliveries';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
