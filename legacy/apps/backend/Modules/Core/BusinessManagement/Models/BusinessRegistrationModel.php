<?php

namespace App\Backend\Modules\Core\BusinessManagement\Models;

use App\Backend\Models\BaseModel;

class BusinessRegistrationModel extends BaseModel
{
    protected string $table = 'business_management_business_registration';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
