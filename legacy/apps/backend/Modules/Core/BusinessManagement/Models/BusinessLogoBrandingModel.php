<?php

namespace App\Backend\Modules\Core\BusinessManagement\Models;

use App\Backend\Models\BaseModel;

class BusinessLogoBrandingModel extends BaseModel
{
    protected string $table = 'business_management_business_logo_branding';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
