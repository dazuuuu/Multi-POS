<?php

namespace App\Backend\Modules\Industry\Healthcare\Doctor\Models;

use App\Backend\Models\BaseModel;

class ReferralLettersModel extends BaseModel
{
    protected string $table = 'healthcare_doctor_referral_letters';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
