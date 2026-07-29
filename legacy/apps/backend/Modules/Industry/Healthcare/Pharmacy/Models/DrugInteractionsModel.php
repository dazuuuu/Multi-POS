<?php

namespace App\Backend\Modules\Industry\Healthcare\Pharmacy\Models;

use App\Backend\Models\BaseModel;

class DrugInteractionsModel extends BaseModel
{
    protected string $table = 'healthcare_pharmacy_drug_interactions';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
