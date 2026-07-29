<?php

namespace App\Backend\Modules\Core\Customers\Models;

use App\Backend\Models\BaseModel;

class CustomerProfilesModel extends BaseModel
{
    protected string $table = 'customers_customer_profiles';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
