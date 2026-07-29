<?php

namespace App\Backend\Modules\Core\Reports\Services;

use App\Backend\Modules\BaseModuleService;
use App\Backend\Modules\Core\Reports\Models\EmployeeReportsModel;

class EmployeeReportsService extends BaseModuleService
{
    private EmployeeReportsModel $model;

    public function __construct()
    {
        parent::__construct('reports', 'employee_reports');
        $this->model = new EmployeeReportsModel();
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
