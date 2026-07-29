<?php

namespace App\Backend\Services;

use App\Backend\Helpers\Database;
use App\Backend\Modules\Roles\RoleRegistry;
use PDO;

class RoleService
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::connection();
    }

    public function seedRoles(): void
    {
        $count = (int) $this->db->query('SELECT COUNT(*) FROM roles')->fetchColumn();
        if ($count > 0) {
            return;
        }

        foreach (RoleRegistry::all() as $key => $role) {
            $stmt = $this->db->prepare(
                'INSERT INTO roles (key, name, category, module_key, description) VALUES (?, ?, ?, ?, ?)'
            );
            $stmt->execute([
                $key,
                $role['name'],
                $role['category'],
                $role['module'] ?? null,
                $role['description'] ?? null,
            ]);

            $roleId = (int) $this->db->lastInsertId();
            $this->seedPermissionsForRole($roleId, $role['permissions'] ?? []);
        }
    }

    private function seedPermissionsForRole(int $roleId, array $permissions): void
    {
        foreach ($permissions as $perm) {
            $permId = $this->getOrCreatePermission($perm);
            $stmt = $this->db->prepare('INSERT OR IGNORE INTO role_permissions (role_id, permission_id) VALUES (?, ?)');
            $stmt->execute([$roleId, $permId]);
        }
    }

    private function getOrCreatePermission(string $key): int
    {
        $stmt = $this->db->prepare('SELECT id FROM permissions WHERE key = ?');
        $stmt->execute([$key]);
        $id = $stmt->fetchColumn();

        if ($id) {
            return (int) $id;
        }

        $parts = explode('.', $key);
        $module = $parts[0] ?? null;

        $stmt = $this->db->prepare('INSERT INTO permissions (key, name, module_key) VALUES (?, ?, ?)');
        $stmt->execute([$key, ucwords(str_replace(['.', '_'], ' ', $key)), $module]);

        return (int) $this->db->lastInsertId();
    }

    public function assignRole(int $businessId, int $userId, string $roleKey, ?int $branchId = null): bool
    {
        $stmt = $this->db->prepare('SELECT id FROM roles WHERE key = ?');
        $stmt->execute([$roleKey]);
        $roleId = $stmt->fetchColumn();

        if (!$roleId) {
            return false;
        }

        $stmt = $this->db->prepare(
            'INSERT OR IGNORE INTO business_user_roles (business_id, user_id, role_id, branch_id) VALUES (?, ?, ?, ?)'
        );
        return $stmt->execute([$businessId, $userId, $roleId, $branchId]);
    }

    public function getUserRoles(int $businessId, int $userId): array
    {
        $stmt = $this->db->prepare(
            'SELECT r.* FROM roles r
             JOIN business_user_roles bur ON bur.role_id = r.id
             WHERE bur.business_id = ? AND bur.user_id = ?'
        );
        $stmt->execute([$businessId, $userId]);
        return $stmt->fetchAll();
    }

    public function getRolesByCategory(): array
    {
        return RoleRegistry::categories();
    }
}
