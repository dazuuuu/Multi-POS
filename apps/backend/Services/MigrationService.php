<?php

namespace App\Backend\Services;

use App\Backend\Helpers\Database;
use PDO;

class MigrationService
{
    private string $migrationsPath;
    private string $modulesPath;

    public function __construct()
    {
        $this->migrationsPath = \FilePaths::root() . '/database/migrations';
        $this->modulesPath = \FilePaths::backendPath('Modules');
    }

    public function runPending(): void
    {
        $pdo = Database::connection();
        $this->ensureMigrationsTable($pdo);

        $this->runDirectoryMigrations($pdo, $this->migrationsPath);
        $this->runModuleMigrations($pdo);
    }

    private function runDirectoryMigrations(PDO $pdo, string $path): void
    {
        $ran = $this->getRanMigrations($pdo);
        $files = glob($path . '/*.php');
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

    private function runModuleMigrations(PDO $pdo): void
    {
        $ran = $this->getRanMigrations($pdo);
        $pattern = $this->modulesPath . '/*/*/migrations/create_tables.php';
        $industryPattern = $this->modulesPath . '/Industry/*/*/migrations/create_tables.php';

        $files = array_merge(
            glob($this->modulesPath . '/Core/*/migrations/create_tables.php') ?: [],
            glob($industryPattern) ?: []
        );

        sort($files);

        foreach ($files as $file) {
            $name = 'module_' . md5($file);
            if (in_array($name, $ran, true)) {
                continue;
            }

            require_once $file;
            $className = $this->classNameFromModuleMigration($file);
            if (!class_exists($className)) {
                continue;
            }

            $className::up($pdo);
            $this->recordMigration($pdo, $name);
        }
    }

    private function classNameFromModuleMigration(string $file): string
    {
        $content = file_get_contents($file);
        if (preg_match('/namespace\s+([^;]+);/', $content, $m)) {
            if (preg_match('/class\s+(\w+)/', $content, $c)) {
                return $m[1] . '\\' . $c[1];
            }
        }
        return '';
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
