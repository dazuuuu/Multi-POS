<?php

namespace App\Backend\Modules\Core\BusinessManagement\Models;

use App\Backend\Models\BaseModel;

class MultipleBusinessesModel extends BaseModel
{
    protected string $table = 'business_management_multiple_businesses';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
