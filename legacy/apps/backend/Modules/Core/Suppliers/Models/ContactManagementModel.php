<?php

namespace App\Backend\Modules\Core\Suppliers\Models;

use App\Backend\Models\BaseModel;

class ContactManagementModel extends BaseModel
{
    protected string $table = 'suppliers_contact_management';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
