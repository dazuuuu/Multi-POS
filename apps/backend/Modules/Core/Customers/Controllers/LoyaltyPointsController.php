<?php

namespace App\Backend\Modules\Core\Customers\Controllers;

use App\Backend\Modules\BaseModuleController;
use App\Backend\Modules\Core\Customers\Services\LoyaltyPointsService;

class LoyaltyPointsController extends BaseModuleController
{
    private LoyaltyPointsService $service;

    public function __construct()
    {
        parent::__construct('customers');
        $this->service = new LoyaltyPointsService();
    }

    public function index(): void
    {
        $businessId = $this->businessId();
        if (!$businessId) {
            $this->jsonResponse(['error' => 'Business context required'], 401);
            return;
        }
        $this->jsonResponse(['feature' => 'loyalty_points', 'data' => $this->service->list($businessId)]);
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
        $this->jsonResponse(['feature' => 'loyalty_points', 'id' => $id, 'data' => $this->service->find($businessId, $id)], 201);
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
        $this->jsonResponse(['feature' => 'loyalty_points', 'data' => $record]);
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
        $this->jsonResponse(['feature' => 'loyalty_points', 'data' => $this->service->find($businessId, $id)]);
    }

    public function destroy(int $id): void
    {
        $businessId = $this->businessId();
        if (!$businessId) {
            $this->jsonResponse(['error' => 'Business context required'], 401);
            return;
        }
        $this->service->delete($businessId, $id);
        $this->jsonResponse(['feature' => 'loyalty_points', 'deleted' => true]);
    }
}
