<?php

namespace App\Backend\Modules\Industry\AgrovetsHardware\Farming\Models;

use App\Backend\Models\BaseModel;

class IrrigationProductsModel extends BaseModel
{
    protected string $table = 'agrovets_hardware_farming_irrigation_products';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
