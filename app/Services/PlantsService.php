<?php


namespace App\Services;

use App\Repositories\PlantsRepository;

class PlantsService
{
    private $plantsRepository;

    public function __construct(PlantsRepository $plantsRepository)
    {
        $this->plantsRepository = $plantsRepository;
    }

    public function listAll()
    {
        try {
            $response = $this->plantsRepository->listAll()->get();
            return response()->json([
                "message" => "Dados recebidos com Sucesso!",
                "resource" => $response
            ], 201);
        } catch (\Exception $exception) {
            return response()->json([
                "message" => "Erro ao receber os dados.",
                "details" => $exception->getMessage()
            ], 500);
        }
    }

    public function filter($request)
    {
        $plants = $this->plantsRepository->listAll();
        if (isset($request['beeName'])) {
            $plants = $plants->whereHas('beePollination', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request['beeName'] . '%');
            })->get();
        } elseif (isset($request['monthName'])) {
            $plants = $plants->whereHas('floweringMonths', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request['monthName'] . '%');
            })->get();
        }
        return $plants;
    }

    public function store($request)
    {
        return $this->plantsRepository->store($request);
    }

    public function update($request, $plantsId)
    {
        return $this->plantsRepository->update($request, $plantsId);
    }

    public function destroy($plantsId)
    {
        return $this->plantsRepository->destroy($plantsId);
    }

}
