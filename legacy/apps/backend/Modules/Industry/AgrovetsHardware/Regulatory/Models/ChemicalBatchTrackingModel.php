<?php

namespace App\Backend\Modules\Industry\AgrovetsHardware\Regulatory\Models;

use App\Backend\Models\BaseModel;

class ChemicalBatchTrackingModel extends BaseModel
{
    protected string $table = 'agrovets_hardware_regulatory_chemical_batch_tracking';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
