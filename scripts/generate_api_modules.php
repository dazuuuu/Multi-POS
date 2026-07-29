<?php

/**
 * Generates Laravel API modules for Core POS and Industry features.
 * Run: php scripts/generate_api_modules.php
 */

$root = dirname(__DIR__);

function studly(string $value): string
{
    return str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $value)));
}

function writeFile(string $path, string $contents): void
{
    $dir = dirname($path);
    if (! is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    if (! file_exists($path)) {
        file_put_contents($path, $contents);
    }
}

$modules = [
    // Core
    'core/products' => [
        'model' => 'Product',
        'table' => 'products',
        'permission' => 'inventory',
        'fillable' => ['name', 'sku', 'barcode', 'description', 'category_id', 'brand_id', 'unit_id', 'cost_price', 'selling_price', 'tax_rate', 'track_stock', 'reorder_level', 'is_active', 'branch_id'],
        'rules' => [
            'name' => 'required|string|max:255',
            'sku' => 'nullable|string|max:100',
            'selling_price' => 'required|numeric|min:0',
            'cost_price' => 'nullable|numeric|min:0',
        ],
    ],
    'core/customers' => [
        'model' => 'Customer',
        'table' => 'customers',
        'permission' => 'customers',
        'fillable' => ['name', 'email', 'phone', 'address', 'credit_limit', 'customer_group_id', 'branch_id', 'is_active'],
        'rules' => [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:50',
        ],
    ],
    'core/suppliers' => [
        'model' => 'Supplier',
        'table' => 'suppliers',
        'permission' => 'inventory',
        'fillable' => ['name', 'email', 'phone', 'address', 'tax_number', 'is_active'],
        'rules' => ['name' => 'required|string|max:255'],
        'create_model' => true,
    ],
    'core/sales' => [
        'model' => 'Sale',
        'table' => 'sales',
        'permission' => 'sales',
        'fillable' => ['branch_id', 'customer_id', 'sale_number', 'sale_type', 'status', 'subtotal', 'tax_amount', 'discount_amount', 'total_amount', 'amount_paid', 'amount_due', 'notes'],
        'rules' => [
            'branch_id' => 'required|integer',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'nullable|integer',
            'items.*.product_name' => 'required|string',
            'items.*.quantity' => 'required|numeric|min:0.0001',
            'items.*.unit_price' => 'required|numeric|min:0',
            'payments' => 'nullable|array',
        ],
        'custom_service' => true,
    ],
    'core/branches' => [
        'model' => 'Branch',
        'table' => 'branches',
        'permission' => 'branches',
        'fillable' => ['name', 'code', 'address', 'phone', 'is_main', 'is_active'],
        'rules' => [
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50',
        ],
    ],
    'core/warehouses' => [
        'model' => 'Warehouse',
        'table' => 'warehouses',
        'permission' => 'inventory',
        'fillable' => ['branch_id', 'name', 'code', 'address', 'is_active'],
        'rules' => ['name' => 'required|string|max:255'],
        'create_model' => true,
    ],
    'core/expenses' => [
        'model' => 'Expense',
        'table' => 'expenses',
        'permission' => 'financials',
        'fillable' => ['branch_id', 'expense_category_id', 'description', 'amount', 'expense_date', 'payment_method', 'reference'],
        'rules' => [
            'description' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'expense_date' => 'required|date',
        ],
        'create_model' => true,
    ],
    'core/invoices' => [
        'model' => 'Invoice',
        'table' => 'invoices',
        'permission' => 'financials',
        'fillable' => ['branch_id', 'customer_id', 'sale_id', 'invoice_number', 'invoice_type', 'status', 'subtotal', 'tax_amount', 'total_amount', 'due_date', 'notes'],
        'rules' => [
            'invoice_number' => 'required|string|max:50',
            'total_amount' => 'required|numeric|min:0',
        ],
        'create_model' => true,
    ],
    'core/purchase-orders' => [
        'model' => 'PurchaseOrder',
        'table' => 'purchase_orders',
        'permission' => 'inventory',
        'fillable' => ['branch_id', 'supplier_id', 'order_number', 'status', 'subtotal', 'tax_amount', 'total_amount', 'expected_date', 'notes'],
        'rules' => [
            'supplier_id' => 'required|integer',
            'order_number' => 'required|string|max:50',
        ],
        'create_model' => true,
    ],
];

// Industry modules: create resource controllers with generic JSON data tables already migrated in phase 2 domain... 
// For industry we'll create dedicated thin modules with their own simple tables if needed.
// Use existing approach: controllers that work against Eloquent models with tenant scope.

$industryFeatures = [
    'restaurant-hotel' => [
        'tables' => 'restaurant_tables',
        'reservations' => 'restaurant_reservations',
        'menu-items' => 'menu_items',
        'kitchen-orders' => 'kitchen_orders',
        'rooms' => 'hotel_rooms',
        'bookings' => 'hotel_bookings',
        'housekeeping' => 'housekeeping_tasks',
        'guests' => 'guest_profiles',
    ],
    'bar-liquor' => [
        'bottles' => 'bar_bottles',
        'tabs' => 'bar_tabs',
        'cocktails' => 'cocktail_recipes',
        'shifts' => 'bar_shifts',
    ],
    'wholesale-retail' => [
        'price-lists' => 'price_lists',
        'delivery-notes' => 'delivery_notes',
        'dispatches' => 'dispatches',
        'credit-accounts' => 'credit_accounts',
    ],
    'supermarket' => [
        'promotions' => 'promotions',
        'coupons' => 'coupons',
        'loyalty-accounts' => 'loyalty_accounts',
        'cashier-sessions' => 'cashier_sessions',
    ],
    'salon-spa' => [
        'appointments' => 'spa_appointments',
        'services' => 'spa_services',
        'packages' => 'spa_packages',
        'treatment-records' => 'treatment_records',
    ],
    'agrovet-hardware' => [
        'batches' => 'agro_batches',
        'equipment' => 'farm_equipment',
        'contractor-accounts' => 'contractor_accounts',
        'tool-rentals' => 'tool_rentals',
    ],
    'healthcare' => [
        'patients' => 'patients',
        'appointments' => 'appointments',
        'encounters' => 'encounters',
        'prescriptions' => 'prescriptions',
        'lab-orders' => 'lab_orders',
        'lab-results' => 'lab_results',
        'admissions' => 'admissions',
        'beds' => 'beds',
        'insurance-claims' => 'insurance_claims',
    ],
];

$stats = ['controllers' => 0, 'services' => 0, 'models' => 0, 'migrations' => 0];
$routeLines = [];

foreach ($modules as $key => $config) {
    [$group, $resource] = explode('/', $key);
    $studly = studly($resource);
    $model = $config['model'];
    $nsController = "App\\Http\\Controllers\\Api\\V1\\".studly($group);
    $nsService = "App\\Services\\".studly($group);
    $controllerClass = "{$studly}Controller";
    $serviceClass = "{$studly}Service";

    // Model if needed
    if (! empty($config['create_model'])) {
        $modelPath = "{$root}/app/Models/{$model}.php";
        $fillableExport = var_export($config['fillable'], true);
        writeFile($modelPath, <<<PHP
<?php

namespace App\Models;

use App\Core\Tenancy\Concerns\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class {$model} extends Model
{
    use BelongsToTenant;
    use SoftDeletes;

    protected \$fillable = {$fillableExport};
}

PHP);
        $stats['models']++;
    }

    // Service
    $servicePath = "{$root}/app/Services/".studly($group)."/{$serviceClass}.php";
    if (empty($config['custom_service'])) {
        writeFile($servicePath, <<<PHP
<?php

namespace {$nsService};

use App\Models\\{$model};
use App\Services\BaseService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class {$serviceClass} extends BaseService
{
    public function list(array \$filters = []): LengthAwarePaginator
    {
        \$query = {$model}::query()->latest();

        if (! empty(\$filters['search'])) {
            \$search = \$filters['search'];
            \$query->where(function (\$q) use (\$search) {
                \$q->where('name', 'like', "%{\$search}%");
            });
        }

        if (isset(\$filters['is_active'])) {
            \$query->where('is_active', (bool) \$filters['is_active']);
        }

        \$perPage = min((int) (\$filters['per_page'] ?? config('api.pagination.per_page', 15)), config('api.pagination.max_per_page', 100));

        return \$query->paginate(\$perPage);
    }

    public function create(array \$data): {$model}
    {
        return {$model}::query()->create(\$data);
    }

    public function find(int \$id): {$model}
    {
        return {$model}::query()->findOrFail(\$id);
    }

    public function update(int \$id, array \$data): {$model}
    {
        \$record = \$this->find(\$id);
        \$record->update(\$data);

        return \$record->fresh();
    }

    public function delete(int \$id): void
    {
        \$this->find(\$id)->delete();
    }
}

PHP);
        $stats['services']++;
    }

    // Controller
    $controllerPath = "{$root}/app/Http/Controllers/Api/V1/".studly($group)."/{$controllerClass}.php";
    $perm = $config['permission'];
    writeFile($controllerPath, <<<PHP
<?php

namespace {$nsController};

use App\Http\Controllers\Api\V1\ApiController;
use {$nsService}\\{$serviceClass};
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class {$controllerClass} extends ApiController
{
    public function __construct(
        private readonly {$serviceClass} \$service,
    ) {}

    public function index(Request \$request): JsonResponse
    {
        \$paginator = \$this->service->list(\$request->all());

        return \$this->success(\$paginator);
    }

    public function store(Request \$request): JsonResponse
    {
        \$data = \$request->validate([
PHP);
    foreach ($config['rules'] as $field => $rule) {
        file_put_contents($controllerPath, "            '{$field}' => '{$rule}',\n", FILE_APPEND);
    }
    file_put_contents($controllerPath, <<<PHP
        ]);

        \$record = \$this->service->create(\$data);

        return \$this->created(\$record);
    }

    public function show(int \$id): JsonResponse
    {
        return \$this->success(\$this->service->find(\$id));
    }

    public function update(Request \$request, int \$id): JsonResponse
    {
        \$data = \$request->validate([
PHP, FILE_APPEND);
    foreach ($config['rules'] as $field => $rule) {
        $optional = str_replace('required|', 'sometimes|', $rule);
        $optional = str_replace('required', 'sometimes', $optional);
        file_put_contents($controllerPath, "            '{$field}' => '{$optional}',\n", FILE_APPEND);
    }
    file_put_contents($controllerPath, <<<PHP
        ]);

        return \$this->success(\$this->service->update(\$id, \$data), 'Updated successfully.');
    }

    public function destroy(int \$id): JsonResponse
    {
        \$this->service->delete(\$id);

        return \$this->success(null, 'Deleted successfully.');
    }
}

PHP, FILE_APPEND);
    $stats['controllers']++;

    $routeLines[] = [
        'group' => $group,
        'resource' => $resource,
        'controller' => "\\{$nsController}\\{$controllerClass}",
        'permission' => $perm,
    ];
}

// Industry migrations + models + controllers
$industryMigrationSql = [];
foreach ($industryFeatures as $module => $resources) {
    foreach ($resources as $resource => $table) {
        $studly = studly($resource);
        $moduleStudly = studly($module);
        $model = $moduleStudly.$studly;
        $nsController = "App\\Http\\Controllers\\Api\\V1\\Industry\\{$moduleStudly}";
        $nsService = "App\\Services\\Industry\\{$moduleStudly}";

        // Migration snippet
        $industryMigrationSql[] = compact('table');

        // Model
        writeFile("{$root}/app/Models/Industry/{$model}.php", <<<PHP
<?php

namespace App\Models\Industry;

use App\Core\Tenancy\Concerns\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class {$model} extends Model
{
    use BelongsToTenant;
    use SoftDeletes;

    protected \$table = '{$table}';

    protected \$fillable = [
        'tenant_id', 'branch_id', 'name', 'code', 'status', 'data', 'metadata', 'is_active',
    ];

    protected function casts(): array
    {
        return [
            'data' => 'array',
            'metadata' => 'array',
            'is_active' => 'boolean',
        ];
    }
}

PHP);
        $stats['models']++;

        writeFile("{$root}/app/Services/Industry/{$moduleStudly}/{$studly}Service.php", <<<PHP
<?php

namespace {$nsService};

use App\Models\Industry\\{$model};
use App\Services\BaseService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class {$studly}Service extends BaseService
{
    public function list(array \$filters = []): LengthAwarePaginator
    {
        \$query = {$model}::query()->latest();
        if (! empty(\$filters['search'])) {
            \$query->where('name', 'like', '%'.\$filters['search'].'%');
        }
        if (! empty(\$filters['status'])) {
            \$query->where('status', \$filters['status']);
        }
        \$perPage = min((int) (\$filters['per_page'] ?? 15), 100);

        return \$query->paginate(\$perPage);
    }

    public function create(array \$data): {$model}
    {
        return {$model}::query()->create(\$data);
    }

    public function find(int \$id): {$model}
    {
        return {$model}::query()->findOrFail(\$id);
    }

    public function update(int \$id, array \$data): {$model}
    {
        \$record = \$this->find(\$id);
        \$record->update(\$data);

        return \$record->fresh();
    }

    public function delete(int \$id): void
    {
        \$this->find(\$id)->delete();
    }
}

PHP);
        $stats['services']++;

        writeFile("{$root}/app/Http/Controllers/Api/V1/Industry/{$moduleStudly}/{$studly}Controller.php", <<<PHP
<?php

namespace {$nsController};

use App\Http\Controllers\Api\V1\ApiController;
use {$nsService}\\{$studly}Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class {$studly}Controller extends ApiController
{
    public function __construct(private readonly {$studly}Service \$service) {}

    public function index(Request \$request): JsonResponse
    {
        return \$this->success(\$this->service->list(\$request->all()));
    }

    public function store(Request \$request): JsonResponse
    {
        \$data = \$request->validate([
            'name' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:100',
            'status' => 'nullable|string|max:50',
            'branch_id' => 'nullable|integer',
            'data' => 'nullable|array',
            'metadata' => 'nullable|array',
            'is_active' => 'nullable|boolean',
        ]);

        return \$this->created(\$this->service->create(\$data));
    }

    public function show(int \$id): JsonResponse
    {
        return \$this->success(\$this->service->find(\$id));
    }

    public function update(Request \$request, int \$id): JsonResponse
    {
        \$data = \$request->validate([
            'name' => 'sometimes|string|max:255',
            'code' => 'nullable|string|max:100',
            'status' => 'nullable|string|max:50',
            'branch_id' => 'nullable|integer',
            'data' => 'nullable|array',
            'metadata' => 'nullable|array',
            'is_active' => 'nullable|boolean',
        ]);

        return \$this->success(\$this->service->update(\$id, \$data));
    }

    public function destroy(int \$id): JsonResponse
    {
        \$this->service->delete(\$id);

        return \$this->success(null, 'Deleted successfully.');
    }
}

PHP);
        $stats['controllers']++;

        $routeLines[] = [
            'group' => "industry/{$module}",
            'resource' => $resource,
            'controller' => "\\{$nsController}\\{$studly}Controller",
            'permission' => 'dashboard.view',
        ];
    }
}

// Write industry migration
$migrationBody = '';
foreach ($industryFeatures as $module => $resources) {
    foreach ($resources as $resource => $table) {
        // patients and appointments already exist from phase 2 - skip those table names if conflict
        if (in_array($table, ['patients', 'appointments'], true)) {
            continue;
        }
        $migrationBody .= "
        if (!Schema::hasTable('{$table}')) {
            Schema::create('{$table}', function (Blueprint \$table) {
                \$table->id();
                \$table->foreignId('tenant_id')->constrained()->cascadeOnDelete();
                \$table->foreignId('branch_id')->nullable()->constrained()->nullOnDelete();
                \$table->string('name')->nullable();
                \$table->string('code', 100)->nullable();
                \$table->string('status', 50)->default('active');
                \$table->json('data')->nullable();
                \$table->json('metadata')->nullable();
                \$table->boolean('is_active')->default(true);
                \$table->softDeletes();
                \$table->timestamps();
                \$table->index(['tenant_id', 'status']);
            });
        }
";
        $stats['migrations']++;
    }
}

writeFile("{$root}/database/migrations/2026_07_29_300001_create_industry_module_tables.php", <<<PHP
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {{$migrationBody}
    }

    public function down(): void
    {
        // Industry tables retained intentionally on rollback of this batch.
    }
};

PHP);

// Write route map JSON for inclusion
file_put_contents("{$root}/routes/api/generated_resources.php", "<?php\n\nreturn ".var_export($routeLines, true).";\n");

echo "Generated controllers={$stats['controllers']} services={$stats['services']} models={$stats['models']} industry_tables={$stats['migrations']}\n";
