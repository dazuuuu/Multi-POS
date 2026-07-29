<?php

namespace App\Backend\Models;

use PDO;

class BaseModel
{
    protected PDO $db;
    protected string $table;
    protected array $fillable = [];
    protected bool $timestamps = true;

    public function __construct()
    {
        $this->db = \App\Backend\Helpers\Database::connection();
    }

    public function getDb(): PDO
    {
        return $this->db;
    }

    public function getTable(): string
    {
        return $this->table;
    }

    public function find(int $id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result ?: null;
    }

    public function findByBusiness(int $businessId, int $id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE business_id = ? AND id = ?");
        $stmt->execute([$businessId, $id]);
        $result = $stmt->fetch();
        return $result ?: null;
    }

    public function findBy(string $column, mixed $value): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE {$column} = ? LIMIT 1");
        $stmt->execute([$value]);
        $result = $stmt->fetch();
        return $result ?: null;
    }

    public function allByBusiness(int $businessId): array
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE business_id = ? ORDER BY id DESC");
        $stmt->execute([$businessId]);
        return $stmt->fetchAll();
    }

    public function all(): array
    {
        $stmt = $this->db->query("SELECT * FROM {$this->table} ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function create(array $data): int
    {
        $data = $this->filterFillable($data);
        if ($this->timestamps) {
            $data['created_at'] = $data['created_at'] ?? date('Y-m-d H:i:s');
            $data['updated_at'] = $data['updated_at'] ?? date('Y-m-d H:i:s');
        }

        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));

        $stmt = $this->db->prepare("INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})");
        $stmt->execute(array_values($data));

        return (int) $this->db->lastInsertId();
    }

    public function update(int $id, array $data): bool
    {
        $data = $this->filterFillable($data);
        if ($this->timestamps) {
            $data['updated_at'] = date('Y-m-d H:i:s');
        }

        $sets = implode(', ', array_map(fn ($col) => "{$col} = ?", array_keys($data)));
        $values = array_values($data);
        $values[] = $id;

        $stmt = $this->db->prepare("UPDATE {$this->table} SET {$sets} WHERE id = ?");
        return $stmt->execute($values);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }

    protected function filterFillable(array $data): array
    {
        if (empty($this->fillable)) {
            return $data;
        }
        return array_intersect_key($data, array_flip($this->fillable));
    }
}
