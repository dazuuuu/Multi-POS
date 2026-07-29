<?php

namespace App\Backend\Modules;

use App\Backend\Helpers\Router;

class ModuleLoader
{
    public static function registerRoutes(Router $router): void
    {
        foreach (glob(\FilePaths::backendPath('Modules/Core/*/')) as $dir) {
            $moduleName = basename(rtrim($dir, '/'));
            if ($moduleName === 'Core') {
                continue;
            }
            $class = "App\\Backend\\Modules\\Core\\{$moduleName}\\{$moduleName}Module";
            if (class_exists($class) && method_exists($class, 'routes')) {
                self::registerModuleRoutes($router, $class::routes());
            }
        }

        foreach (glob(\FilePaths::backendPath('Modules/Industry/*/')) as $dir) {
            foreach (glob($dir . '*/') as $subDir) {
                if (!is_dir($subDir . 'Controllers')) {
                    continue;
                }
                $moduleName = basename(rtrim($dir, '/'));
                $subName = basename(rtrim($subDir, '/'));
                $subClass = "App\\Backend\\Modules\\Industry\\{$moduleName}\\{$subName}\\{$subName}Submodule";
                if (class_exists($subClass) && method_exists($subClass, 'routes')) {
                    self::registerModuleRoutes($router, $subClass::routes());
                }
            }
        }
    }

    private static function registerModuleRoutes(Router $router, array $routes): void
    {
        foreach ($routes as $route => $handler) {
            $parts = explode(' ', $route, 2);
            if (count($parts) !== 2) {
                continue;
            }

            [$method, $path] = $parts;
            $path = preg_replace('/\{(\w+)\}/', '($1)', $path);

            $router->add($method, $path, function (array $params = []) use ($handler) {
                [$class, $action] = $handler;
                $controller = new $class();

                if (isset($params['id'])) {
                    $controller->$action($params['id']);
                } else {
                    $controller->$action();
                }
            });
        }
    }

    public static function listModules(): array
    {
        $modules = ['core' => [], 'industry' => []];

        foreach (glob(\FilePaths::backendPath('Modules/Core/*/')) as $dir) {
            $name = basename(rtrim($dir, '/'));
            if ($name === 'Core') {
                continue;
            }
            $modules['core'][] = [
                'folder' => $name,
                'path' => "apps/backend/Modules/Core/{$name}",
                'controllers' => count(glob($dir . 'Controllers/*.php') ?: []),
                'services' => count(glob($dir . 'Services/*.php') ?: []),
                'models' => count(glob($dir . 'Models/*.php') ?: []),
                'migrations' => is_dir($dir . 'migrations') ? 1 : 0,
            ];
        }

        foreach (glob(\FilePaths::backendPath('Modules/Industry/*/')) as $dir) {
            $name = basename(rtrim($dir, '/'));
            $submodules = [];
            foreach (glob($dir . '*/') as $subDir) {
                $subName = basename(rtrim($subDir, '/'));
                if (!is_dir($subDir . 'Controllers')) {
                    continue;
                }
                $submodules[] = [
                    'folder' => $subName,
                    'path' => "apps/backend/Modules/Industry/{$name}/{$subName}",
                    'controllers' => count(glob($subDir . 'Controllers/*.php') ?: []),
                    'services' => count(glob($subDir . 'Services/*.php') ?: []),
                    'models' => count(glob($subDir . 'Models/*.php') ?: []),
                ];
            }
            $modules['industry'][] = ['folder' => $name, 'submodules' => $submodules];
        }

        return $modules;
    }
}
