<?php

namespace App\Backend\Modules\Industry\Supermarkets\Loyalty\Models;

use App\Backend\Models\BaseModel;

class RewardPointsModel extends BaseModel
{
    protected string $table = 'supermarkets_loyalty_reward_points';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
