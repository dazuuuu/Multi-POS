<?php

namespace App\Backend\Modules;

use App\Backend\Models\BaseModel;

abstract class BaseModuleService
{
    protected string $moduleKey;
    protected string $featureKey;

    public function __construct(string $moduleKey, string $featureKey)
    {
        $this->moduleKey = $moduleKey;
        $this->featureKey = $featureKey;
    }

    public function getModuleKey(): string
    {
        return $this->moduleKey;
    }

    public function getFeatureKey(): string
    {
        return $this->featureKey;
    }

    protected function scopedQuery(BaseModel $model, int $businessId, ?int $branchId = null): array
    {
        $table = $this->getTableName($model);
        $sql = "SELECT * FROM {$table} WHERE business_id = ?";
        $params = [$businessId];

        if ($branchId !== null && $this->tableHasColumn($table, 'branch_id')) {
            $sql .= ' AND branch_id = ?';
            $params[] = $branchId;
        }

        $sql .= ' ORDER BY id DESC';
        $stmt = $model->getDb()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    protected function getTableName(BaseModel $model): string
    {
        $reflection = new \ReflectionClass($model);
        $property = $reflection->getProperty('table');
        $property->setAccessible(true);
        return $property->getValue($model);
    }

    protected function tableHasColumn(string $table, string $column): bool
    {
        return true;
    }
}
