<?php

namespace App\Backend\Modules\Industry\Healthcare\Laboratory\Models;

use App\Backend\Models\BaseModel;

class ExternalLabIntegrationModel extends BaseModel
{
    protected string $table = 'healthcare_laboratory_external_lab_integration';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
