<?php

namespace App\Backend\Modules\Industry\Healthcare\Pharmacy\Models;

use App\Backend\Models\BaseModel;

class GenericSubstitutionsModel extends BaseModel
{
    protected string $table = 'healthcare_pharmacy_generic_substitutions';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
