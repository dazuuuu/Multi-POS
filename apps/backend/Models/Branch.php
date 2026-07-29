<?php

namespace App\Backend\Models;

class Branch extends BaseModel
{
    protected string $table = 'branches';
    protected array $fillable = [
        'business_id', 'name', 'code', 'address', 'phone', 'is_main', 'is_active',
    ];

    public function findByBusiness(int $businessId): array
    {
        $stmt = $this->db->prepare('SELECT * FROM branches WHERE business_id = ? ORDER BY is_main DESC, name');
        $stmt->execute([$businessId]);
        return $stmt->fetchAll();
    }
}
