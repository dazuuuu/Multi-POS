<?php

namespace App\Http\Controllers\Api\V1\Core;

use App\Http\Controllers\Api\V1\ApiController;
use App\Services\Core\SalesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SalesController extends ApiController
{
    public function __construct(
        private readonly SalesService $service,
    ) {}

    public function index(Request $request): JsonResponse
    {
        $paginator = $this->service->list($request->all());

        return $this->success($paginator);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([            'branch_id' => 'required|integer',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'nullable|integer',
            'items.*.product_name' => 'required|string',
            'items.*.quantity' => 'required|numeric|min:0.0001',
            'items.*.unit_price' => 'required|numeric|min:0',
            'payments' => 'nullable|array',
        ]);

        $record = $this->service->create($data);

        return $this->created($record);
    }

    public function show(int $id): JsonResponse
    {
        return $this->success($this->service->find($id));
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $data = $request->validate([            'branch_id' => 'sometimes|integer',
            'items' => 'sometimes|array|min:1',
            'items.*.product_id' => 'nullable|integer',
            'items.*.product_name' => 'sometimes|string',
            'items.*.quantity' => 'sometimes|numeric|min:0.0001',
            'items.*.unit_price' => 'sometimes|numeric|min:0',
            'payments' => 'nullable|array',
        ]);

        return $this->success($this->service->update($id, $data), 'Updated successfully.');
    }

    public function destroy(int $id): JsonResponse
    {
        $this->service->delete($id);

        return $this->success(null, 'Deleted successfully.');
    }
}
