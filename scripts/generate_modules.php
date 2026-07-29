<?php

/**
 * Generates full module folder structure with Controllers, Services, Models, and migrations.
 * Run: php scripts/generate_modules.php
 */

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Backend\Modules\Registry\CoreModules;
use App\Backend\Modules\Registry\IndustryModules;

function toPascalCase(string $key): string
{
    return str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
}

function toStudlyFeature(string $feature): string
{
    return toPascalCase($feature);
}

$root = dirname(__DIR__);
$corePath = $root . '/apps/backend/Modules/Core';
$industryPath = $root . '/apps/backend/Modules/Industry';

$stats = ['controllers' => 0, 'services' => 0, 'models' => 0, 'migrations' => 0, 'modules' => 0];

// Core modules
foreach (CoreModules::all() as $moduleKey => $module) {
    $moduleName = toPascalCase($moduleKey);
    $moduleDir = "{$corePath}/{$moduleName}";
    $features = $module['features'] ?? [];

    createModuleStructure($moduleDir, $moduleKey, $moduleName, 'Core', $features, null, $stats);
}

// Industry modules
foreach (IndustryModules::all() as $moduleKey => $module) {
    $moduleName = toPascalCase($moduleKey);
    $moduleDir = "{$industryPath}/{$moduleName}";

    if (isset($module['submodules'])) {
        foreach ($module['submodules'] as $subKey => $submodule) {
            $subName = toPascalCase($subKey);
            $subDir = "{$moduleDir}/{$subName}";
            createModuleStructure($subDir, $moduleKey, $moduleName, 'Industry', $submodule['features'] ?? [], $subKey, $stats);
        }
        createIndustryModuleBootstrap($moduleDir, $moduleKey, $moduleName, array_keys($module['submodules']), $stats);
    } else {
        createModuleStructure($moduleDir, $moduleKey, $moduleName, 'Industry', $module['features'] ?? [], null, $stats);
    }
}

echo "Generated:\n";
echo "  Modules: {$stats['modules']}\n";
echo "  Controllers: {$stats['controllers']}\n";
echo "  Services: {$stats['services']}\n";
echo "  Models: {$stats['models']}\n";
echo "  Migration files: {$stats['migrations']}\n";

function createModuleStructure(
    string $dir,
    string $moduleKey,
    string $moduleName,
    string $type,
    array $features,
    ?string $subKey,
    array &$stats
): void {
    $dirs = [
        "{$dir}/Controllers",
        "{$dir}/Services",
        "{$dir}/Models",
        "{$dir}/migrations",
    ];

    foreach ($dirs as $d) {
        if (!is_dir($d)) {
            mkdir($d, 0755, true);
        }
    }

    $namespace = "App\\Backend\\Modules\\{$type}\\{$moduleName}";
    if ($subKey) {
        $subName = toPascalCase($subKey);
        $namespace .= "\\{$subName}";
    }

    $stats['modules']++;

    // Module bootstrap
    $bootstrapClass = $subKey ? toPascalCase($subKey) . 'Submodule' : $moduleName . 'Module';
    $bootstrapFile = "{$dir}/{$bootstrapClass}.php";
    if (!file_exists($bootstrapFile)) {
        $subKeyConst = $subKey ? "'{$subKey}'" : 'null';
        file_put_contents($bootstrapFile, <<<PHP
<?php

namespace {$namespace};

class {$bootstrapClass}
{
    public const MODULE_KEY = '{$moduleKey}';
    public const SUBMODULE_KEY = {$subKeyConst};

    public static function features(): array
    {
        return [
PHP);
        foreach ($features as $f) {
            file_put_contents($bootstrapFile, "            '{$f}',\n", FILE_APPEND);
        }
        file_put_contents($bootstrapFile, <<<PHP
        ];
    }

    public static function routes(): array
    {
        return [
PHP, FILE_APPEND);
        foreach ($features as $f) {
            $studly = toStudlyFeature($f);
            $routePath = $subKey ? "/api/modules/{$moduleKey}/{$subKey}/{$f}" : "/api/modules/{$moduleKey}/{$f}";
            file_put_contents($bootstrapFile, "            'GET {$routePath}' => [Controllers\\{$studly}Controller::class, 'index'],\n", FILE_APPEND);
            file_put_contents($bootstrapFile, "            'POST {$routePath}' => [Controllers\\{$studly}Controller::class, 'store'],\n", FILE_APPEND);
            file_put_contents($bootstrapFile, "            'GET {$routePath}/{id}' => [Controllers\\{$studly}Controller::class, 'show'],\n", FILE_APPEND);
            file_put_contents($bootstrapFile, "            'PUT {$routePath}/{id}' => [Controllers\\{$studly}Controller::class, 'update'],\n", FILE_APPEND);
            file_put_contents($bootstrapFile, "            'DELETE {$routePath}/{id}' => [Controllers\\{$studly}Controller::class, 'destroy'],\n", FILE_APPEND);
        }
        file_put_contents($bootstrapFile, "        ];\n    }\n}\n", FILE_APPEND);
    }

    // Generate per-feature files
    foreach ($features as $feature) {
        $studly = toStudlyFeature($feature);
        $tableName = $moduleKey . '_' . ($subKey ? $subKey . '_' : '') . $feature;

        // Controller
        $controllerFile = "{$dir}/Controllers/{$studly}Controller.php";
        if (!file_exists($controllerFile)) {
            file_put_contents($controllerFile, <<<PHP
<?php

namespace {$namespace}\\Controllers;

use App\Backend\Modules\BaseModuleController;
use {$namespace}\\Services\\{$studly}Service;

class {$studly}Controller extends BaseModuleController
{
    private {$studly}Service \$service;

    public function __construct()
    {
        parent::__construct('{$moduleKey}');
        \$this->service = new {$studly}Service();
    }

    public function index(): void
    {
        \$businessId = \$this->businessId();
        if (!\$businessId) {
            \$this->jsonResponse(['error' => 'Business context required'], 401);
            return;
        }
        \$this->jsonResponse(['feature' => '{$feature}', 'data' => \$this->service->list(\$businessId)]);
    }

    public function store(): void
    {
        \$businessId = \$this->businessId();
        if (!\$businessId) {
            \$this->jsonResponse(['error' => 'Business context required'], 401);
            return;
        }
        \$data = json_decode(file_get_contents('php://input'), true) ?? \$_POST;
        \$data['business_id'] = \$businessId;
        \$id = \$this->service->create(\$data);
        \$this->jsonResponse(['feature' => '{$feature}', 'id' => \$id, 'data' => \$this->service->find(\$businessId, \$id)], 201);
    }

    public function show(int \$id): void
    {
        \$businessId = \$this->businessId();
        if (!\$businessId) {
            \$this->jsonResponse(['error' => 'Business context required'], 401);
            return;
        }
        \$record = \$this->service->find(\$businessId, \$id);
        if (!\$record) {
            \$this->jsonResponse(['error' => 'Not found'], 404);
            return;
        }
        \$this->jsonResponse(['feature' => '{$feature}', 'data' => \$record]);
    }

    public function update(int \$id): void
    {
        \$businessId = \$this->businessId();
        if (!\$businessId) {
            \$this->jsonResponse(['error' => 'Business context required'], 401);
            return;
        }
        \$data = json_decode(file_get_contents('php://input'), true) ?? \$_POST;
        \$this->service->update(\$businessId, \$id, \$data);
        \$this->jsonResponse(['feature' => '{$feature}', 'data' => \$this->service->find(\$businessId, \$id)]);
    }

    public function destroy(int \$id): void
    {
        \$businessId = \$this->businessId();
        if (!\$businessId) {
            \$this->jsonResponse(['error' => 'Business context required'], 401);
            return;
        }
        \$this->service->delete(\$businessId, \$id);
        \$this->jsonResponse(['feature' => '{$feature}', 'deleted' => true]);
    }
}

PHP);
            $stats['controllers']++;
        }

        // Service
        $serviceFile = "{$dir}/Services/{$studly}Service.php";
        if (!file_exists($serviceFile)) {
            file_put_contents($serviceFile, <<<PHP
<?php

namespace {$namespace}\\Services;

use App\Backend\Modules\BaseModuleService;
use {$namespace}\\Models\\{$studly}Model;

class {$studly}Service extends BaseModuleService
{
    private {$studly}Model \$model;

    public function __construct()
    {
        parent::__construct('{$moduleKey}', '{$feature}');
        \$this->model = new {$studly}Model();
    }

    public function list(int \$businessId): array
    {
        return \$this->model->allByBusiness(\$businessId);
    }

    public function find(int \$businessId, int \$id): ?array
    {
        return \$this->model->findByBusiness(\$businessId, \$id);
    }

    public function create(array \$data): int
    {
        return \$this->model->create(\$data);
    }

    public function update(int \$businessId, int \$id, array \$data): bool
    {
        if (!\$this->model->findByBusiness(\$businessId, \$id)) {
            return false;
        }
        return \$this->model->update(\$id, \$data);
    }

    public function delete(int \$businessId, int \$id): bool
    {
        if (!\$this->model->findByBusiness(\$businessId, \$id)) {
            return false;
        }
        return \$this->model->delete(\$id);
    }
}

PHP);
            $stats['services']++;
        }

        // Model
        $modelFile = "{$dir}/Models/{$studly}Model.php";
        if (!file_exists($modelFile)) {
            file_put_contents($modelFile, <<<PHP
<?php

namespace {$namespace}\\Models;

use App\Backend\Models\BaseModel;

class {$studly}Model extends BaseModel
{
    protected string \$table = '{$tableName}';
    protected array \$fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}

PHP);
            $stats['models']++;
        }
    }

    // Migration for all features in this module/submodule
    $migrationFile = "{$dir}/migrations/create_tables.php";
    if (!file_exists($migrationFile)) {
        $sql = '';
        foreach ($features as $feature) {
            $tableName = $moduleKey . '_' . ($subKey ? $subKey . '_' : '') . $feature;
            $sql .= "
        \$pdo->exec('CREATE TABLE IF NOT EXISTS {$tableName} (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            business_id INTEGER NOT NULL,
            branch_id INTEGER DEFAULT NULL,
            data TEXT DEFAULT NULL,
            status VARCHAR(50) DEFAULT \"active\",
            metadata TEXT DEFAULT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (business_id) REFERENCES businesses(id),
            FOREIGN KEY (branch_id) REFERENCES branches(id)
        )');";
        }

        file_put_contents($migrationFile, <<<PHP
<?php

namespace {$namespace}\\Migrations;

class CreateTables
{
    public static function up(\\PDO \$pdo): void
    {{$sql}
    }
}

PHP);
        $stats['migrations']++;
    }
}

function createIndustryModuleBootstrap(string $dir, string $moduleKey, string $moduleName, array $submodules, array &$stats): void
{
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }

    $namespace = "App\\Backend\\Modules\\Industry\\{$moduleName}";
    $file = "{$dir}/{$moduleName}Module.php";

    if (file_exists($file)) {
        return;
    }

    $subRoutes = '';
    foreach ($submodules as $sub) {
        $subName = toPascalCase($sub);
        $subRoutes .= "        ...\\{$subName}\\{$subName}Submodule::routes(),\n";
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
PHP);
    foreach ($submodules as $sub) {
        file_put_contents($file, "            '{$sub}',\n", FILE_APPEND);
    }
    file_put_contents($file, <<<PHP
        ];
    }

    public static function routes(): array
    {
        return array_merge(
{$subRoutes}        );
    }
}

PHP);
}
