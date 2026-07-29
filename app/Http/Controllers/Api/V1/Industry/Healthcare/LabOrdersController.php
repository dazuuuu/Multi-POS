<?php

namespace App\Http\Controllers\Api\V1\Industry\Healthcare;

use App\Http\Controllers\Api\V1\ApiController;
use App\Services\Industry\Healthcare\LabOrdersService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LabOrdersController extends ApiController
{
    public function __construct(private readonly LabOrdersService $service) {}

    public function index(Request $request): JsonResponse
    {
        return $this->success($this->service->list($request->all()));
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:100',
            'status' => 'nullable|string|max:50',
            'branch_id' => 'nullable|integer',
            'data' => 'nullable|array',
            'metadata' => 'nullable|array',
            'is_active' => 'nullable|boolean',
        ]);

        return $this->created($this->service->create($data));
    }

    public function show(int $id): JsonResponse
    {
        return $this->success($this->service->find($id));
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'code' => 'nullable|string|max:100',
            'status' => 'nullable|string|max:50',
            'branch_id' => 'nullable|integer',
            'data' => 'nullable|array',
            'metadata' => 'nullable|array',
            'is_active' => 'nullable|boolean',
        ]);

        return $this->success($this->service->update($id, $data));
    }

    public function destroy(int $id): JsonResponse
    {
        $this->service->delete($id);

        return $this->success(null, 'Deleted successfully.');
    }
}
