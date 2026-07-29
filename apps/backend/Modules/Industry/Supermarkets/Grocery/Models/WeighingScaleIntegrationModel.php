<?php

namespace App\Backend\Modules\Industry\Supermarkets\Grocery\Models;

use App\Backend\Models\BaseModel;

class WeighingScaleIntegrationModel extends BaseModel
{
    protected string $table = 'supermarkets_grocery_weighing_scale_integration';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
