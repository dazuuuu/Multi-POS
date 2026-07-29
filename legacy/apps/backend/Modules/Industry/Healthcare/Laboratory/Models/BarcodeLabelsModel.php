<?php

namespace App\Backend\Modules\Industry\Healthcare\Laboratory\Models;

use App\Backend\Models\BaseModel;

class BarcodeLabelsModel extends BaseModel
{
    protected string $table = 'healthcare_laboratory_barcode_labels';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
