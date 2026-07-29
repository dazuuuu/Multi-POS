<?php

namespace App\Backend\Modules\Industry\AgrovetsHardware\Farming\Services;

use App\Backend\Modules\BaseModuleService;
use App\Backend\Modules\Industry\AgrovetsHardware\Farming\Models\FertilizersModel;

class FertilizersService extends BaseModuleService
{
    private FertilizersModel $model;

    public function __construct()
    {
        parent::__construct('agrovets_hardware', 'fertilizers');
        $this->model = new FertilizersModel();
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
