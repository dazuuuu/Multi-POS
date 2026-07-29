<?php

namespace App\Backend\Modules\Industry\Healthcare\Nursing\Models;

use App\Backend\Models\BaseModel;

class NursingNotesModel extends BaseModel
{
    protected string $table = 'healthcare_nursing_nursing_notes';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
