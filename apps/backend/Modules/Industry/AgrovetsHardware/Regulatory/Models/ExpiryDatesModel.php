<?php

namespace App\Backend\Modules\Industry\AgrovetsHardware\Regulatory\Models;

use App\Backend\Models\BaseModel;

class ExpiryDatesModel extends BaseModel
{
    protected string $table = 'agrovets_hardware_regulatory_expiry_dates';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
