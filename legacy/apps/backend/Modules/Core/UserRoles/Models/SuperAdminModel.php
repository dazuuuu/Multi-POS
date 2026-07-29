<?php

namespace App\Backend\Modules\Core\UserRoles\Models;

use App\Backend\Models\BaseModel;

class SuperAdminModel extends BaseModel
{
    protected string $table = 'user_roles_super_admin';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
