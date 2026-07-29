<?php

class CreateAuditLogsTable
{
    public function up(\PDO $pdo): void
    {
        $pdo->exec('CREATE TABLE IF NOT EXISTS audit_logs (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER DEFAULT NULL,
            user_id INTEGER DEFAULT NULL,
            action VARCHAR(100) NOT NULL,
            entity_type VARCHAR(100) DEFAULT NULL,
            entity_id INTEGER DEFAULT NULL,
            details TEXT DEFAULT NULL,
            ip_address VARCHAR(45) DEFAULT NULL,
            user_agent TEXT DEFAULT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (business_id) REFERENCES businesses(id),
            FOREIGN KEY (user_id) REFERENCES users(id)
        )');

        $pdo->exec('CREATE TABLE IF NOT EXISTS sessions (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            business_id INTEGER DEFAULT NULL,
            token VARCHAR(255) NOT NULL UNIQUE,
            ip_address VARCHAR(45) DEFAULT NULL,
            user_agent TEXT DEFAULT NULL,
            expires_at DATETIME NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id),
            FOREIGN KEY (business_id) REFERENCES businesses(id)
        )');
    }

    public function down(\PDO $pdo): void
    {
        $pdo->exec('DROP TABLE IF EXISTS sessions');
        $pdo->exec('DROP TABLE IF EXISTS audit_logs');
    }
}
