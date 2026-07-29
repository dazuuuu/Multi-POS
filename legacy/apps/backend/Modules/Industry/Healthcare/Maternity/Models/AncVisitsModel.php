<?php

namespace App\Backend\Modules\Industry\Healthcare\Maternity\Models;

use App\Backend\Models\BaseModel;

class AncVisitsModel extends BaseModel
{
    protected string $table = 'healthcare_maternity_anc_visits';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
