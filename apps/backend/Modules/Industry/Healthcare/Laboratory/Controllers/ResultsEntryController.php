<?php

namespace App\Backend\Modules\Industry\Healthcare\Laboratory\Controllers;

use App\Backend\Modules\BaseModuleController;
use App\Backend\Modules\Industry\Healthcare\Laboratory\Services\ResultsEntryService;

class ResultsEntryController extends BaseModuleController
{
    private ResultsEntryService $service;

    public function __construct()
    {
        parent::__construct('healthcare');
        $this->service = new ResultsEntryService();
    }

    public function index(): void
    {
        $businessId = $this->businessId();
        if (!$businessId) {
            $this->jsonResponse(['error' => 'Business context required'], 401);
            return;
        }
        $this->jsonResponse(['feature' => 'results_entry', 'data' => $this->service->list($businessId)]);
    }

    public function store(): void
    {
        $businessId = $this->businessId();
        if (!$businessId) {
            $this->jsonResponse(['error' => 'Business context required'], 401);
            return;
        }
        $data = json_decode(file_get_contents('php://input'), true) ?? $_POST;
        $data['business_id'] = $businessId;
        $id = $this->service->create($data);
        $this->jsonResponse(['feature' => 'results_entry', 'id' => $id, 'data' => $this->service->find($businessId, $id)], 201);
    }

    public function show(int $id): void
    {
        $businessId = $this->businessId();
        if (!$businessId) {
            $this->jsonResponse(['error' => 'Business context required'], 401);
            return;
        }
        $record = $this->service->find($businessId, $id);
        if (!$record) {
            $this->jsonResponse(['error' => 'Not found'], 404);
            return;
        }
        $this->jsonResponse(['feature' => 'results_entry', 'data' => $record]);
    }

    public function update(int $id): void
    {
        $businessId = $this->businessId();
        if (!$businessId) {
            $this->jsonResponse(['error' => 'Business context required'], 401);
            return;
        }
        $data = json_decode(file_get_contents('php://input'), true) ?? $_POST;
        $this->service->update($businessId, $id, $data);
        $this->jsonResponse(['feature' => 'results_entry', 'data' => $this->service->find($businessId, $id)]);
    }

    public function destroy(int $id): void
    {
        $businessId = $this->businessId();
        if (!$businessId) {
            $this->jsonResponse(['error' => 'Business context required'], 401);
            return;
        }
        $this->service->delete($businessId, $id);
        $this->jsonResponse(['feature' => 'results_entry', 'deleted' => true]);
    }
}
