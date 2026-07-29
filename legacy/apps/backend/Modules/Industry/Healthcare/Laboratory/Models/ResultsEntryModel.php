<?php

namespace App\Backend\Modules\Industry\Healthcare\Laboratory\Models;

use App\Backend\Models\BaseModel;

class ResultsEntryModel extends BaseModel
{
    protected string $table = 'healthcare_laboratory_results_entry';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
