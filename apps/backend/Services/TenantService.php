<?php

namespace App\Backend\Services;

use App\Backend\Models\Business;

class TenantService
{
    public function __construct(
        private Business $businessModel = new Business(),
        private SessionService $sessionService = new SessionService(),
    ) {
    }

    public function currentBusinessId(): ?int
    {
        $business = $this->sessionService->business();
        return $business ? (int) $business['id'] : null;
    }

    public function setCurrentBusiness(int $businessId, int $userId): bool
    {
        $business = $this->businessModel->find($businessId);
        if (!$business || (int) $business['owner_id'] !== $userId) {
            return false;
        }

        $this->sessionService->setBusiness($business);
        return true;
    }

    public function getUserBusinesses(int $userId): array
    {
        return $this->businessModel->findByOwner($userId);
    }
}
