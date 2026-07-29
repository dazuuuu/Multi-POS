<?php

namespace App\Backend\Modules\Core\Customers\Services;

use App\Backend\Modules\BaseModuleService;
use App\Backend\Modules\Core\Customers\Models\CustomerStatementsModel;

class CustomerStatementsService extends BaseModuleService
{
    private CustomerStatementsModel $model;

    public function __construct()
    {
        parent::__construct('customers', 'customer_statements');
        $this->model = new CustomerStatementsModel();
    }

    public function list(int $businessId): array
    {
        return $this->model->allByBusiness($businessId);
    }

    public function find(int $businessId, int $id): ?array
    {
        return $this->model->findByBusiness($businessId, $id);
    }

    public function create(array $data): int
    {
        return $this->model->create($data);
    }

    public function update(int $businessId, int $id, array $data): bool
    {
        if (!$this->model->findByBusiness($businessId, $id)) {
            return false;
        }
        return $this->model->update($id, $data);
    }

    public function delete(int $businessId, int $id): bool
    {
        if (!$this->model->findByBusiness($businessId, $id)) {
            return false;
        }
        return $this->model->delete($id);
    }
}
