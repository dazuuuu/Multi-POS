<?php

namespace App\Backend\Modules\Industry\Healthcare\Maternity\Models;

use App\Backend\Models\BaseModel;

class PostnatalCareModel extends BaseModel
{
    protected string $table = 'healthcare_maternity_postnatal_care';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
