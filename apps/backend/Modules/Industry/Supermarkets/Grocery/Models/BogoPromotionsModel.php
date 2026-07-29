<?php

namespace App\Backend\Modules\Industry\Supermarkets\Grocery\Models;

use App\Backend\Models\BaseModel;

class BogoPromotionsModel extends BaseModel
{
    protected string $table = 'supermarkets_grocery_bogo_promotions';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
