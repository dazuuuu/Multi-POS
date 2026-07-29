<?php

class CreateModulesTable
{
    public function up(\PDO $pdo): void
    {
        $pdo->exec('CREATE TABLE IF NOT EXISTS business_modules (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            module_key VARCHAR(100) NOT NULL,
            module_category VARCHAR(50) NOT NULL,
            is_enabled INTEGER DEFAULT 1,
            settings TEXT DEFAULT NULL,
            activated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            UNIQUE(business_id, module_key),
            FOREIGN KEY (business_id) REFERENCES businesses(id)
        )');

        $pdo->exec('CREATE TABLE IF NOT EXISTS module_features (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            module_key VARCHAR(100) NOT NULL,
            feature_key VARCHAR(100) NOT NULL,
            is_enabled INTEGER DEFAULT 1,
            UNIQUE(business_id, module_key, feature_key),
            FOREIGN KEY (business_id) REFERENCES businesses(id)
        )');

        $pdo->exec('CREATE TABLE IF NOT EXISTS subscriptions (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            tier VARCHAR(50) NOT NULL,
            status VARCHAR(50) DEFAULT "active",
            starts_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            ends_at DATETIME DEFAULT NULL,
            trial_ends_at DATETIME DEFAULT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (business_id) REFERENCES businesses(id)
        )');
    }

    public function down(\PDO $pdo): void
    {
        $pdo->exec('DROP TABLE IF EXISTS subscriptions');
        $pdo->exec('DROP TABLE IF EXISTS module_features');
        $pdo->exec('DROP TABLE IF EXISTS business_modules');
    }
}
