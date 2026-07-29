<?php

namespace App\Backend\Modules\Industry\Supermarkets\Grocery\Models;

use App\Backend\Models\BaseModel;

class ShelfLabelsModel extends BaseModel
{
    protected string $table = 'supermarkets_grocery_shelf_labels';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
