<?php

namespace App\Backend\Modules\Industry\Healthcare\Insurance\Models;

use App\Backend\Models\BaseModel;

class MemberVerificationModel extends BaseModel
{
    protected string $table = 'healthcare_insurance_member_verification';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
