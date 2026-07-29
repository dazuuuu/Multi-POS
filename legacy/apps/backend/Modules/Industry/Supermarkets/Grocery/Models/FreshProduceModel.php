<?php

namespace App\Backend\Modules\Industry\Supermarkets\Grocery\Models;

use App\Backend\Models\BaseModel;

class FreshProduceModel extends BaseModel
{
    protected string $table = 'supermarkets_grocery_fresh_produce';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
