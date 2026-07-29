<?php

namespace App\Backend\Modules\Industry\BarLiquor\BarOperations\Models;

use App\Backend\Models\BaseModel;

class OpenTabManagementModel extends BaseModel
{
    protected string $table = 'bar_liquor_bar_operations_open_tab_management';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
