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
        $this->routes[$method][] = [
            'pattern' => $this->pathToRegex($normalized),
            'path' => $normalized,
            'handler' => $handler,
            'params' => $this->extractParamNames($normalized),
        ];
    }

    public function get(string $path, callable $handler): void
    {
        $this->add('GET', $path, $handler);
    }

    public function post(string $path, callable $handler): void
    {
        $this->add('POST', $path, $handler);
    }

    public function put(string $path, callable $handler): void
    {
        $this->add('PUT', $path, $handler);
    }

    public function delete(string $path, callable $handler): void
    {
        $this->add('DELETE', $path, $handler);
    }

    public function dispatch(string $method, string $uri): mixed
    {
        $path = $this->normalizePath(parse_url($uri, PHP_URL_PATH) ?: '/');
        $routes = $this->routes[$method] ?? [];

        foreach ($routes as $route) {
            if (preg_match($route['pattern'], $path, $matches)) {
                $params = [];
                foreach ($route['params'] as $param) {
                    if (isset($matches[$param])) {
                        $params[$param] = is_numeric($matches[$param]) ? (int) $matches[$param] : $matches[$param];
                    }
                }
                return $route['handler']($params);
            }
        }

        http_response_code(404);
        return ResponseHelper::html('errors/404', ['title' => 'Page Not Found', 'path' => $path]);
    }

    private function pathToRegex(string $path): string
    {
        $pattern = preg_replace('/\((\w+)\)/', '(?P<$1>[^/]+)', $path);
        return '#^' . $pattern . '$#';
    }

    private function extractParamNames(string $path): array
    {
        preg_match_all('/\((\w+)\)/', $path, $matches);
        return $matches[1] ?? [];
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
