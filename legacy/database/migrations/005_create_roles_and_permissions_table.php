<?php

class CreateRolesAndPermissionsTable
{
    public function up(\PDO $pdo): void
    {
        $pdo->exec('CREATE TABLE IF NOT EXISTS roles (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            key VARCHAR(100) NOT NULL UNIQUE,
            name VARCHAR(255) NOT NULL,
            category VARCHAR(50) NOT NULL,
            module_key VARCHAR(100) DEFAULT NULL,
            description TEXT DEFAULT NULL,
            is_system INTEGER DEFAULT 1,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )');

        $pdo->exec('CREATE TABLE IF NOT EXISTS permissions (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            key VARCHAR(150) NOT NULL UNIQUE,
            name VARCHAR(255) NOT NULL,
            module_key VARCHAR(100) DEFAULT NULL,
            category VARCHAR(50) DEFAULT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )');

        $pdo->exec('CREATE TABLE IF NOT EXISTS role_permissions (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            role_id INTEGER NOT NULL,
            permission_id INTEGER NOT NULL,
            UNIQUE(role_id, permission_id),
            FOREIGN KEY (role_id) REFERENCES roles(id),
            FOREIGN KEY (permission_id) REFERENCES permissions(id)
        )');

        $pdo->exec('CREATE TABLE IF NOT EXISTS business_user_roles (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            user_id INTEGER NOT NULL,
            role_id INTEGER NOT NULL,
            branch_id INTEGER DEFAULT NULL,
            assigned_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            UNIQUE(business_id, user_id, role_id, branch_id),
            FOREIGN KEY (business_id) REFERENCES businesses(id),
            FOREIGN KEY (user_id) REFERENCES users(id),
            FOREIGN KEY (role_id) REFERENCES roles(id),
            FOREIGN KEY (branch_id) REFERENCES branches(id)
        )');
    }

    public function down(\PDO $pdo): void
    {
        $pdo->exec('DROP TABLE IF EXISTS business_user_roles');
        $pdo->exec('DROP TABLE IF EXISTS role_permissions');
        $pdo->exec('DROP TABLE IF EXISTS permissions');
        $pdo->exec('DROP TABLE IF EXISTS roles');
    }
}
