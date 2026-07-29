<?php

namespace App\Backend\Modules\Industry\Supermarkets\Loyalty\Models;

use App\Backend\Models\BaseModel;

class MembershipCardsModel extends BaseModel
{
    protected string $table = 'supermarkets_loyalty_membership_cards';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
