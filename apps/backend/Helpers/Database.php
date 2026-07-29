<?php

namespace App\Backend\Helpers;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $connection = null;

    public static function connection(): PDO
    {
        if (self::$connection === null) {
            $config = require \FilePaths::appPath('config/database.php');
            $driver = $config['driver'];

            try {
                if ($driver === 'sqlite') {
                    $path = $config['sqlite']['path'];
                    $dir = dirname($path);
                    if (!is_dir($dir)) {
                        mkdir($dir, 0755, true);
                    }
                    self::$connection = new PDO('sqlite:' . $path);
                } else {
                    $mysql = $config['mysql'];
                    $dsn = sprintf(
                        'mysql:host=%s;port=%s;dbname=%s;charset=%s',
                        $mysql['host'],
                        $mysql['port'],
                        $mysql['database'],
                        $mysql['charset']
                    );
                    self::$connection = new PDO($dsn, $mysql['username'], $mysql['password']);
                }

                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new \RuntimeException('Database connection failed: ' . $e->getMessage());
            }
        }

        return self::$connection;
    }

    public static function reset(): void
    {
        self::$connection = null;
    }
}
