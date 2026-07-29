<?php

namespace App\Http\Controllers\Api\V1\Core;

use App\Http\Controllers\Api\V1\ApiController;
use App\Services\Core\CustomersService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomersController extends ApiController
{
    public function __construct(
        private readonly CustomersService $service,
    ) {}

    public function index(Request $request): JsonResponse
    {
        $paginator = $this->service->list($request->all());

        return $this->success($paginator);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:50',
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
        $data = $request->validate([            'name' => 'sometimes|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:50',
        ]);

        return $this->success($this->service->update($id, $data), 'Updated successfully.');
    }

    public function destroy(int $id): JsonResponse
    {
        $this->service->delete($id);

        return $this->success(null, 'Deleted successfully.');
    }
}
