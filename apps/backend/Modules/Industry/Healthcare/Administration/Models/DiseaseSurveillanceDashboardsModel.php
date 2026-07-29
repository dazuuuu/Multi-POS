<?php

namespace App\Backend\Modules\Industry\Healthcare\Administration\Models;

use App\Backend\Models\BaseModel;

class DiseaseSurveillanceDashboardsModel extends BaseModel
{
    protected string $table = 'healthcare_administration_disease_surveillance_dashboards';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
