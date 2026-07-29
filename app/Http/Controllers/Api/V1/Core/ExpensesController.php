<?php

namespace App\Http\Controllers\Api\V1\Core;

use App\Http\Controllers\Api\V1\ApiController;
use App\Services\Core\ExpensesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ExpensesController extends ApiController
{
    public function __construct(
        private readonly ExpensesService $service,
    ) {}

    public function index(Request $request): JsonResponse
    {
        $paginator = $this->service->list($request->all());

        return $this->success($paginator);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([            'description' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'expense_date' => 'required|date',
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
        $data = $request->validate([            'description' => 'sometimes|string',
            'amount' => 'sometimes|numeric|min:0',
            'expense_date' => 'sometimes|date',
        ]);

        return $this->success($this->service->update($id, $data), 'Updated successfully.');
    }

    public function destroy(int $id): JsonResponse
    {
        $this->service->delete($id);

        return $this->success(null, 'Deleted successfully.');
    }
}
