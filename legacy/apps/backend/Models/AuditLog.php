<?php

namespace App\Backend\Models;

class AuditLog extends BaseModel
{
    protected string $table = 'audit_logs';
    protected bool $timestamps = false;
    protected array $fillable = [
        'business_id', 'user_id', 'action', 'entity_type',
        'entity_id', 'details', 'ip_address', 'user_agent',
    ];
}
