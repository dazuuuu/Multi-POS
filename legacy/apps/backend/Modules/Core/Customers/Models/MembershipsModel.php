<?php

namespace App\Backend\Modules\Core\Customers\Models;

use App\Backend\Models\BaseModel;

class MembershipsModel extends BaseModel
{
    protected string $table = 'customers_memberships';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
