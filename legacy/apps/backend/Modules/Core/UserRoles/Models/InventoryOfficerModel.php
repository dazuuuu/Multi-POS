<?php

namespace App\Backend\Modules\Core\UserRoles\Models;

use App\Backend\Models\BaseModel;

class InventoryOfficerModel extends BaseModel
{
    protected string $table = 'user_roles_inventory_officer';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
