<?php

class CreateBusinessesTable
{
    public function up(\PDO $pdo): void
    {
        $pdo->exec('CREATE TABLE IF NOT EXISTS businesses (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            owner_id INTEGER NOT NULL,
            name VARCHAR(255) NOT NULL,
            slug VARCHAR(255) NOT NULL UNIQUE,
            industry_type VARCHAR(100) DEFAULT NULL,
            logo_url VARCHAR(500) DEFAULT NULL,
            email VARCHAR(255) DEFAULT NULL,
            phone VARCHAR(50) DEFAULT NULL,
            address TEXT DEFAULT NULL,
            tax_number VARCHAR(100) DEFAULT NULL,
            currency VARCHAR(10) DEFAULT "USD",
            timezone VARCHAR(50) DEFAULT "UTC",
            tax_rate DECIMAL(5,2) DEFAULT 0.00,
            operating_hours TEXT DEFAULT NULL,
            subscription_tier VARCHAR(50) DEFAULT "starter",
            is_active INTEGER DEFAULT 1,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (owner_id) REFERENCES users(id)
        )');

        $pdo->exec('CREATE TABLE IF NOT EXISTS branches (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            name VARCHAR(255) NOT NULL,
            code VARCHAR(50) DEFAULT NULL,
            address TEXT DEFAULT NULL,
            phone VARCHAR(50) DEFAULT NULL,
            is_main INTEGER DEFAULT 0,
            is_active INTEGER DEFAULT 1,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (business_id) REFERENCES businesses(id)
        )');

        $pdo->exec('CREATE TABLE IF NOT EXISTS business_users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            user_id INTEGER NOT NULL,
            branch_id INTEGER DEFAULT NULL,
            role VARCHAR(50) DEFAULT "cashier",
            is_active INTEGER DEFAULT 1,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            UNIQUE(business_id, user_id),
            FOREIGN KEY (business_id) REFERENCES businesses(id),
            FOREIGN KEY (user_id) REFERENCES users(id),
            FOREIGN KEY (branch_id) REFERENCES branches(id)
        )');
    }

    public function down(\PDO $pdo): void
    {
        $pdo->exec('DROP TABLE IF EXISTS business_users');
        $pdo->exec('DROP TABLE IF EXISTS branches');
        $pdo->exec('DROP TABLE IF EXISTS businesses');
    }
}
