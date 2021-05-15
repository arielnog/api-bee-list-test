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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlantsRequest $request)
    {
        $request->validated();
        try {
            $response = $this->plantsService->store($request->all());
            return response([
                "message" => "A Planta foi criada com sucesso",
                "resource" => $response
            ], 201);
        } catch (ValidationException $exception) {
            return response([
                "message" => "Erro no envio de dados",
                "details" => $exception->getMessage()
            ], 422);
        } catch (HttpResponseException $exception) {
            return response($exception->getMessage());
        } catch (Exception $exception) {
            return response([
                "message" => "Erro na criação da Planta",
                "details" => $exception->getMessage()
            ], 500);
        }

    }

    public function filter(Request $request)
    {
        $plants = $this->plantsService->filter($request);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Plants $plants
     * @return \Illuminate\Http\Response
     */
    public function show(Plants $plants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Plants $plants
     * @return \Illuminate\Http\Response
     */
    public function edit(Plants $plants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Plants $plants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plants $plants)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Plants $plants
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plants $plants)
    {
        //
    }
}
