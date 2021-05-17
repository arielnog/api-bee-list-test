<?php

namespace App\Http\Controllers;

use App\Http\Requests\BeeRequest;
use App\Models\Bee;
use App\Services\BeeService;
use Illuminate\Http\Request;

class BeeController extends Controller
{
    private $beeService;

    public function __construct(BeeService $beeService)
    {
        $this->beeService = $beeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->beeService->listAll();
    }

    public function create()
    {

    }

    public function store(BeeRequest $request)
    {
        $request->validated();
        try {
            $response = $this->beeService->store($request->all());
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

    public function update(BeeRequest $request, $beeId)
    {
        $request->validated();
        try {
            $response = $this->beeService->update($request->all());
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

    public function destroy(Bee $bee)
    {
        //
    }
}
