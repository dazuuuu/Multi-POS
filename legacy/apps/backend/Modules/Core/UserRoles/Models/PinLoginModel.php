<?php

namespace App\Backend\Modules\Core\UserRoles\Models;

use App\Backend\Models\BaseModel;

class PinLoginModel extends BaseModel
{
    protected string $table = 'user_roles_pin_login';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
