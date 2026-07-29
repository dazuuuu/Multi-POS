<?php

namespace App\Backend\Services;

use App\Backend\Helpers\Database;
use PDO;

class MigrationService
{
    private string $migrationsPath;

    public function __construct()
    {
        $this->migrationsPath = \FilePaths::root() . '/database/migrations';
    }

    public function runPending(): void
    {
        $pdo = Database::connection();
        $this->ensureMigrationsTable($pdo);

        $ran = $this->getRanMigrations($pdo);
        $files = glob($this->migrationsPath . '/*.php');
        sort($files);

        foreach ($files as $file) {
            $name = basename($file, '.php');
            if (in_array($name, $ran, true)) {
                continue;
            }

            require_once $file;
            $className = $this->classNameFromFile($name);
            if (!class_exists($className)) {
                continue;
            }

            $migration = new $className();
            $migration->up($pdo);
            $this->recordMigration($pdo, $name);
        }
    }

    private function ensureMigrationsTable(PDO $pdo): void
    {
        $pdo->exec('CREATE TABLE IF NOT EXISTS migrations (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            migration VARCHAR(255) NOT NULL UNIQUE,
            ran_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )');
    }

    private function getRanMigrations(PDO $pdo): array
    {
        $stmt = $pdo->query('SELECT migration FROM migrations');
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    private function recordMigration(PDO $pdo, string $name): void
    {
        $stmt = $pdo->prepare('INSERT INTO migrations (migration) VALUES (?)');
        $stmt->execute([$name]);
    }

    private function classNameFromFile(string $name): string
    {
        $parts = explode('_', $name);
        array_shift($parts);
        return implode('', array_map('ucfirst', $parts));
    }
}
