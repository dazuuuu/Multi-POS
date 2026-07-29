<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoginHistory extends Model
{
    protected $fillable = [
        'user_id', 'tenant_id', 'ip_address', 'user_agent',
        'device_name', 'success', 'failure_reason',
    ];

    protected function casts(): array
    {
        return ['success' => 'boolean'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
