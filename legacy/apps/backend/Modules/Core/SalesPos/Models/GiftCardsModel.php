<?php

namespace App\Backend\Modules\Core\SalesPos\Models;

use App\Backend\Models\BaseModel;

class GiftCardsModel extends BaseModel
{
    protected string $table = 'sales_pos_gift_cards';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
