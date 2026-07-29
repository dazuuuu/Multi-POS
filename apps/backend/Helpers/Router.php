<?php

namespace App\Backend\Helpers;

class Router
{
    private array $routes = [];
    private string $basePath;

    public function __construct(string $basePath = '')
    {
        $this->basePath = rtrim($basePath, '/');
    }

    public function add(string $method, string $path, callable $handler): void
    {
        $normalized = $this->normalizePath($path);
        $this->routes[$method][$normalized] = $handler;
    }

    public function get(string $path, callable $handler): void
    {
        $this->add('GET', $path, $handler);
    }

    public function post(string $path, callable $handler): void
    {
        $this->add('POST', $path, $handler);
    }

    public function dispatch(string $method, string $uri): mixed
    {
        $path = $this->normalizePath(parse_url($uri, PHP_URL_PATH) ?: '/');
        $handler = $this->routes[$method][$path] ?? null;

        if ($handler === null) {
            http_response_code(404);
            return ResponseHelper::html('errors/404', ['title' => 'Page Not Found', 'path' => $path]);
        }

        return $handler();
    }

    private function normalizePath(string $path): string
    {
        $path = '/' . trim($path, '/');
        if ($this->basePath !== '' && str_starts_with($path, $this->basePath)) {
            $path = substr($path, strlen($this->basePath)) ?: '/';
        }
        return $path === '' ? '/' : $path;
    }
}
