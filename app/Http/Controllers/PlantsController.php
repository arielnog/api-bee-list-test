<?php

namespace App\Http\Controllers;

use App\Http\Requests\BeeRequest;
use App\Http\Requests\PlantsRequest;
use App\Models\Plants;
use App\Services\PlantsService;
use Illuminate\Http\Request;

class PlantsController extends Controller
{
    private $plantsService;

    public function __construct(PlantsService $plantsService)
    {
        $this->plantsService = $plantsService;
    }

    public function listAll()
    {
        try {
            $response = $this->plantsService->listAll();
            return $response;
        } catch (ValidationException $exception) {
            return response()->json([
                "message" => "Erro no envio de dados",
                "details" => $exception->getMessage()
            ], 422);
        } catch (HttpResponseException $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function store(PlantsRequest $request)
    {
        $request->validated();
        try {
            $response = $this->plantsService->store($request->all());
            return $response;
        } catch (ValidationException $exception) {
            return response()->json([
                "message" => "Erro no envio de dados",
                "details" => $exception->getMessage()
            ], 422);
        } catch (HttpResponseException $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function filter(Request $request)
    {
        try {
            $response = $this->plantsService->filter($request);;
            return $response;
        } catch (ValidationException $exception) {
            return response()->json([
                "message" => "Erro no envio de dados",
                "details" => $exception->getMessage()
            ], 422);
        } catch (HttpResponseException $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function update(PlantsRequest $request, $plantsId)
    {
        $request->validated();
        try {
            $response = $this->plantsService->update($request->all(), $plantsId);
            return $response;
        } catch (ValidationException $exception) {
            return response()->json([
                "message" => "Erro no envio de dados",
                "details" => $exception->getMessage()
            ], 422);
        } catch (HttpResponseException $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function destroy($plantsId)
    {
        try {
            $response = $this->plantsService->destroy($plantsId);
            return $response;
        } catch (ValidationException $exception) {
            return response()->json([
                "message" => "Erro no envio de dados",
                "details" => $exception->getMessage()
            ], 422);
        } catch (HttpResponseException $exception) {
            return response()->json($exception->getMessage());
        }
    }
}
