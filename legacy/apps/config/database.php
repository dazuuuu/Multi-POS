<?php

return [
    'driver' => getenv('DB_DRIVER') ?: 'sqlite',
    'sqlite' => [
        'path' => \FilePaths::root() . '/database/multi_pos.sqlite',
    ],
    'mysql' => [
        'host' => getenv('DB_HOST') ?: '127.0.0.1',
        'port' => getenv('DB_PORT') ?: '3306',
        'database' => getenv('DB_DATABASE') ?: 'multi_pos',
        'username' => getenv('DB_USERNAME') ?: 'root',
        'password' => getenv('DB_PASSWORD') ?: '',
        'charset' => 'utf8mb4',
    ],
];
