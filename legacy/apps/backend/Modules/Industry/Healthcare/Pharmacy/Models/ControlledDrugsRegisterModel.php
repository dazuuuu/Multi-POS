<?php

namespace App\Backend\Modules\Industry\Healthcare\Pharmacy\Models;

use App\Backend\Models\BaseModel;

class ControlledDrugsRegisterModel extends BaseModel
{
    protected string $table = 'healthcare_pharmacy_controlled_drugs_register';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
