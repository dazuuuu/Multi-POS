<?php

namespace App\Backend\Modules\Industry\BeautySpa\CustomerRecords\Services;

use App\Backend\Modules\BaseModuleService;
use App\Backend\Modules\Industry\BeautySpa\CustomerRecords\Models\BeforeAfterPhotosModel;

class BeforeAfterPhotosService extends BaseModuleService
{
    private BeforeAfterPhotosModel $model;

    public function __construct()
    {
        parent::__construct('beauty_spa', 'before_after_photos');
        $this->model = new BeforeAfterPhotosModel();
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
