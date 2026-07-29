<?php

namespace App\Backend\Modules\Industry\BeautySpa\Appointments\Migrations;

class CreateTables
{
    public static function up(\PDO $pdo): void
    {
        $pdo->exec('CREATE TABLE IF NOT EXISTS beauty_spa_appointments_online_booking (
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
        $pdo->exec('CREATE TABLE IF NOT EXISTS beauty_spa_appointments_walk_ins (
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
        $pdo->exec('CREATE TABLE IF NOT EXISTS beauty_spa_appointments_calendar (
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
        $pdo->exec('CREATE TABLE IF NOT EXISTS beauty_spa_appointments_staff_schedules (
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
        $pdo->exec('CREATE TABLE IF NOT EXISTS beauty_spa_appointments_reminders (
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
