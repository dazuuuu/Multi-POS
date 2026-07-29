<?php

namespace App\Backend\Modules\Core\UserRoles\Models;

use App\Backend\Models\BaseModel;

class LaboratoryTechnicianModel extends BaseModel
{
    protected string $table = 'user_roles_laboratory_technician';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
