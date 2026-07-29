<?php

namespace App\Backend\Modules;

use App\Backend\Controllers\BaseController;
use App\Backend\Services\SessionService;

abstract class BaseModuleController extends BaseController
{
    protected string $moduleKey;
    protected SessionService $session;

    public function __construct(string $moduleKey)
    {
        $this->moduleKey = $moduleKey;
        $this->session = new SessionService();
    }

    protected function businessId(): ?int
    {
        $business = $this->session->business();
        return $business ? (int) $business['id'] : null;
    }

    protected function userId(): ?int
    {
        $user = $this->session->user();
        return $user ? (int) $user['id'] : null;
    }

    protected function jsonResponse(array $data, int $status = 200): void
    {
        \App\Backend\Helpers\ResponseHelper::json($data, $status);
    }
}
