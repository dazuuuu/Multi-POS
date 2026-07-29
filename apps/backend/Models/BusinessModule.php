<?php

namespace App\Backend\Models;

class BusinessModule extends BaseModel
{
    protected string $table = 'business_modules';
    protected bool $timestamps = false;
    protected array $fillable = [
        'business_id', 'module_key', 'module_category', 'is_enabled', 'settings',
    ];

    public function getActiveByBusiness(int $businessId): array
    {
        $stmt = $this->db->prepare(
            'SELECT * FROM business_modules WHERE business_id = ? AND is_enabled = 1 ORDER BY module_category, module_key'
        );
        $stmt->execute([$businessId]);
        return $stmt->fetchAll();
    }

    public function isEnabled(int $businessId, string $moduleKey): bool
    {
        $stmt = $this->db->prepare(
            'SELECT id FROM business_modules WHERE business_id = ? AND module_key = ? AND is_enabled = 1'
        );
        $stmt->execute([$businessId, $moduleKey]);
        return (bool) $stmt->fetch();
    }

    public function enable(int $businessId, string $moduleKey, string $category): void
    {
        $existing = $this->db->prepare(
            'SELECT id FROM business_modules WHERE business_id = ? AND module_key = ?'
        );
        $existing->execute([$businessId, $moduleKey]);
        if ($existing->fetch()) {
            $stmt = $this->db->prepare(
                'UPDATE business_modules SET is_enabled = 1, module_category = ? WHERE business_id = ? AND module_key = ?'
            );
            $stmt->execute([$category, $businessId, $moduleKey]);
            return;
        }

        $this->create([
            'business_id' => $businessId,
            'module_key' => $moduleKey,
            'module_category' => $category,
            'is_enabled' => 1,
        ]);
    }
}
