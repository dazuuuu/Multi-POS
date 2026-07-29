<?php

namespace App\Backend\Models;

class Business extends BaseModel
{
    protected string $table = 'businesses';
    protected array $fillable = [
        'owner_id', 'name', 'slug', 'industry_type', 'logo_url',
        'email', 'phone', 'address', 'tax_number', 'currency',
        'timezone', 'tax_rate', 'operating_hours', 'subscription_tier', 'is_active',
    ];

    public function findBySlug(string $slug): ?array
    {
        return $this->findBy('slug', $slug);
    }

    public function findByOwner(int $ownerId): array
    {
        $stmt = $this->db->prepare('SELECT * FROM businesses WHERE owner_id = ? ORDER BY created_at DESC');
        $stmt->execute([$ownerId]);
        return $stmt->fetchAll();
    }
}
