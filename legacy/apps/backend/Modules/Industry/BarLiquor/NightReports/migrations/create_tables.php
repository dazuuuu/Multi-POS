<?php

namespace App\Backend\Modules\Industry\BarLiquor\NightReports\Migrations;

class CreateTables
{
    public static function up(\PDO $pdo): void
    {
        $pdo->exec('CREATE TABLE IF NOT EXISTS bar_liquor_night_reports_bartender_sales (
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
        $pdo->exec('CREATE TABLE IF NOT EXISTS bar_liquor_night_reports_shift_closing (
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
        $pdo->exec('CREATE TABLE IF NOT EXISTS bar_liquor_night_reports_cash_reconciliation (
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
