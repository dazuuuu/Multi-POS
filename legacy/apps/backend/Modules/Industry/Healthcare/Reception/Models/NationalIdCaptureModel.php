<?php

namespace App\Backend\Modules\Industry\Healthcare\Reception\Models;

use App\Backend\Models\BaseModel;

class NationalIdCaptureModel extends BaseModel
{
    protected string $table = 'healthcare_reception_national_id_capture';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
