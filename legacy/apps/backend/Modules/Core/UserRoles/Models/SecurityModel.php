<?php

namespace App\Backend\Modules\Core\UserRoles\Models;

use App\Backend\Models\BaseModel;

class SecurityModel extends BaseModel
{
    protected string $table = 'user_roles_security';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
