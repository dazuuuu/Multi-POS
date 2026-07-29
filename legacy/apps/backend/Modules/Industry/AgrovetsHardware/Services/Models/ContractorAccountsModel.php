<?php

namespace App\Backend\Modules\Industry\AgrovetsHardware\Services\Models;

use App\Backend\Models\BaseModel;

class ContractorAccountsModel extends BaseModel
{
    protected string $table = 'agrovets_hardware_services_contractor_accounts';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
