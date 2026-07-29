<?php

namespace App\Backend\Modules\Core\BusinessManagement\Migrations;

class CreateTables
{
    public static function up(\PDO $pdo): void
    {
        $pdo->exec('CREATE TABLE IF NOT EXISTS business_management_business_registration (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            branch_id INTEGER DEFAULT NULL,
            data TEXT DEFAULT NULL,
            status VARCHAR(50) DEFAULT "active",
            metadata TEXT DEFAULT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (business_id) REFERENCES businesses(id),
            FOREIGN KEY (branch_id) REFERENCES branches(id)
        )');
        $pdo->exec('CREATE TABLE IF NOT EXISTS business_management_company_profile (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            branch_id INTEGER DEFAULT NULL,
            data TEXT DEFAULT NULL,
            status VARCHAR(50) DEFAULT "active",
            metadata TEXT DEFAULT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (business_id) REFERENCES businesses(id),
            FOREIGN KEY (branch_id) REFERENCES branches(id)
        )');
        $pdo->exec('CREATE TABLE IF NOT EXISTS business_management_business_logo_branding (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            branch_id INTEGER DEFAULT NULL,
            data TEXT DEFAULT NULL,
            status VARCHAR(50) DEFAULT "active",
            metadata TEXT DEFAULT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (business_id) REFERENCES businesses(id),
            FOREIGN KEY (branch_id) REFERENCES branches(id)
        )');
        $pdo->exec('CREATE TABLE IF NOT EXISTS business_management_multiple_businesses (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            branch_id INTEGER DEFAULT NULL,
            data TEXT DEFAULT NULL,
            status VARCHAR(50) DEFAULT "active",
            metadata TEXT DEFAULT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (business_id) REFERENCES businesses(id),
            FOREIGN KEY (branch_id) REFERENCES branches(id)
        )');
        $pdo->exec('CREATE TABLE IF NOT EXISTS business_management_tax_configuration (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            branch_id INTEGER DEFAULT NULL,
            data TEXT DEFAULT NULL,
            status VARCHAR(50) DEFAULT "active",
            metadata TEXT DEFAULT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (business_id) REFERENCES businesses(id),
            FOREIGN KEY (branch_id) REFERENCES branches(id)
        )');
        $pdo->exec('CREATE TABLE IF NOT EXISTS business_management_currency_settings (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            branch_id INTEGER DEFAULT NULL,
            data TEXT DEFAULT NULL,
            status VARCHAR(50) DEFAULT "active",
            metadata TEXT DEFAULT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (business_id) REFERENCES businesses(id),
            FOREIGN KEY (branch_id) REFERENCES branches(id)
        )');
        $pdo->exec('CREATE TABLE IF NOT EXISTS business_management_timezone_settings (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            branch_id INTEGER DEFAULT NULL,
            data TEXT DEFAULT NULL,
            status VARCHAR(50) DEFAULT "active",
            metadata TEXT DEFAULT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (business_id) REFERENCES businesses(id),
            FOREIGN KEY (branch_id) REFERENCES branches(id)
        )');
        $pdo->exec('CREATE TABLE IF NOT EXISTS business_management_operating_hours (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            branch_id INTEGER DEFAULT NULL,
            data TEXT DEFAULT NULL,
            status VARCHAR(50) DEFAULT "active",
            metadata TEXT DEFAULT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (business_id) REFERENCES businesses(id),
            FOREIGN KEY (branch_id) REFERENCES branches(id)
        )');
    }
}
