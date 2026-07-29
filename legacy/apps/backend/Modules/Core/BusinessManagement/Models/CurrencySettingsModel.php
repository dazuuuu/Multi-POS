<?php

namespace App\Backend\Modules\Core\BusinessManagement\Models;

use App\Backend\Models\BaseModel;

class CurrencySettingsModel extends BaseModel
{
    protected string $table = 'business_management_currency_settings';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
