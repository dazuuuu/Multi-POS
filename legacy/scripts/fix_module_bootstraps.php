<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Backend\Modules\Registry\IndustryModules;

function toPascalCase(string $key): string
{
    return str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
}

foreach (IndustryModules::all() as $moduleKey => $module) {
    if (!isset($module['submodules'])) {
        continue;
    }

    $moduleName = toPascalCase($moduleKey);
    $dir = dirname(__DIR__) . "/apps/backend/Modules/Industry/{$moduleName}";
    $file = "{$dir}/{$moduleName}Module.php";
    $namespace = "App\\Backend\\Modules\\Industry\\{$moduleName}";

    $subRoutes = '';
    foreach (array_keys($module['submodules']) as $subKey) {
        $subName = toPascalCase($subKey);
        $subRoutes .= "            ...\\{$subName}\\{$subName}Submodule::routes(),\n";
    }

    $subRoutesFull = '';
    foreach (array_keys($module['submodules']) as $subKey) {
        $subName = toPascalCase($subKey);
        $subRoutesFull .= "            ...{$namespace}\\{$subName}\\{$subName}Submodule::routes(),\n";
    }

    $subList = '';
    foreach (array_keys($module['submodules']) as $subKey) {
        $subList .= "            '{$subKey}',\n";
    }

    file_put_contents($file, <<<PHP
<?php

namespace {$namespace};

class {$moduleName}Module
{
    public const MODULE_KEY = '{$moduleKey}';

    public static function submodules(): array
    {
        return [
{$subList}        ];
    }

    public static function routes(): array
    {
        return array_merge(
{$subRoutesFull}        );
    }
}

PHP);
    echo "Fixed: {$file}\n";
}

// Also fix core module bootstraps
use App\Backend\Modules\Registry\CoreModules;

foreach (CoreModules::all() as $moduleKey => $module) {
    $moduleName = toPascalCase($moduleKey);
    $dir = dirname(__DIR__) . "/apps/backend/Modules/Core/{$moduleName}";
    $file = "{$dir}/{$moduleName}Module.php";
    $namespace = "App\\Backend\\Modules\\Core\\{$moduleName}";
    $features = $module['features'] ?? [];

    $featureList = '';
    foreach ($features as $f) {
        $featureList .= "            '{$f}',\n";
    }

    $routes = '';
    foreach ($features as $f) {
        $studly = toPascalCase($f);
        $routes .= "            'GET /api/modules/{$moduleKey}/{$f}' => [Controllers\\{$studly}Controller::class, 'index'],\n";
        $routes .= "            'POST /api/modules/{$moduleKey}/{$f}' => [Controllers\\{$studly}Controller::class, 'store'],\n";
        $routes .= "            'GET /api/modules/{$moduleKey}/{$f}/{id}' => [Controllers\\{$studly}Controller::class, 'show'],\n";
        $routes .= "            'PUT /api/modules/{$moduleKey}/{$f}/{id}' => [Controllers\\{$studly}Controller::class, 'update'],\n";
        $routes .= "            'DELETE /api/modules/{$moduleKey}/{$f}/{id}' => [Controllers\\{$studly}Controller::class, 'destroy'],\n";
    }

    file_put_contents($file, <<<PHP
<?php

namespace {$namespace};

class {$moduleName}Module
{
    public const MODULE_KEY = '{$moduleKey}';

    public static function features(): array
    {
        return [
{$featureList}        ];
    }

    public static function routes(): array
    {
        return [
{$routes}        ];
    }
}

PHP);
    echo "Fixed core: {$file}\n";
}

echo "Done.\n";
