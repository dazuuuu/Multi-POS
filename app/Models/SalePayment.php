<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SalePayment extends Model
{
    protected $fillable = ['sale_id', 'payment_method', 'amount', 'reference', 'metadata'];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:4',
            'metadata' => 'array',
        ];
    }

    public function sale(): BelongsTo
    {
        return $this->belongsTo(Sale::class);
    }
}
