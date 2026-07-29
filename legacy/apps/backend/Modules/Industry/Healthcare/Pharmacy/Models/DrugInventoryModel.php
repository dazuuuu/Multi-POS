<?php

namespace App\Backend\Modules\Industry\Healthcare\Pharmacy\Models;

use App\Backend\Models\BaseModel;

class DrugInventoryModel extends BaseModel
{
    protected string $table = 'healthcare_pharmacy_drug_inventory';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
