<?php

namespace App\Backend\Modules\Industry\Healthcare\Theatre\Models;

use App\Backend\Models\BaseModel;

class SurgicalNotesModel extends BaseModel
{
    protected string $table = 'healthcare_theatre_surgical_notes';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
