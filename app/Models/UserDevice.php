<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserDevice extends Model
{
    protected $fillable = [
        'user_id', 'device_id', 'device_name', 'platform',
        'last_active_at', 'is_trusted',
    ];

    protected function casts(): array
    {
        return [
            'last_active_at' => 'datetime',
            'is_trusted' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
