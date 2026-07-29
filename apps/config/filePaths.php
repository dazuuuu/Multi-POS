<?php

class FilePaths
{
    public static function root(): string
    {
        return dirname(__DIR__, 2);
    }

    public static function appPath(string $path = ''): string
    {
        return self::root() . '/apps' . ($path ? '/' . ltrim($path, '/') : '');
    }

    public static function backendPath(string $path = ''): string
    {
        return self::appPath('backend' . ($path ? '/' . ltrim($path, '/') : ''));
    }

    public static function publicPath(string $path = ''): string
    {
        return self::root() . '/public' . ($path ? '/' . ltrim($path, '/') : '');
    }

    public static function databasePath(string $path = ''): string
    {
        return self::root() . '/database' . ($path ? '/' . ltrim($path, '/') : '');
    }
}
