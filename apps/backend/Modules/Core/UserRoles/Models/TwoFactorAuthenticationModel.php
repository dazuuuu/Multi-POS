<?php

namespace App\Backend\Modules\Core\UserRoles\Models;

use App\Backend\Models\BaseModel;

class TwoFactorAuthenticationModel extends BaseModel
{
    protected string $table = 'user_roles_two_factor_authentication';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
