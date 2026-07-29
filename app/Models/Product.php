<?php

namespace App\Models;

use App\Core\Tenancy\Concerns\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use BelongsToTenant;
    use SoftDeletes;

    protected $fillable = [
        'tenant_id', 'branch_id', 'category_id', 'brand_id', 'unit_id',
        'name', 'sku', 'barcode', 'description', 'cost_price', 'selling_price',
        'tax_rate', 'track_stock', 'track_batch', 'track_serial', 'reorder_level',
        'image_url', 'is_active', 'created_by', 'updated_by',
    ];

    protected function casts(): array
    {
        return [
            'cost_price' => 'decimal:4',
            'selling_price' => 'decimal:4',
            'tax_rate' => 'decimal:2',
            'reorder_level' => 'decimal:4',
            'track_stock' => 'boolean',
            'track_batch' => 'boolean',
            'track_serial' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
}
