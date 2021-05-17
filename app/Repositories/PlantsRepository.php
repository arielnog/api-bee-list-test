<?php


namespace App\Repositories;

use App\Models\Plants;

class PlantsRepository
{
    private $plants;

    public function __construct(Plants $plants)
    {
        $this->plants = $plants;
    }

    public function listAll()
    {
        $response = $this->plants->with('floweringMonths', 'beePollination');
        return $response;
    }

    public function getById($plantsId)
    {
        try {
            $response = $this->plants->with('floweringMonths', 'beePollination')->withTrashed()->findOrFail($plantsId);
            return $response;
        } catch (\Exception $exception) {
            return response()->json([
                "message" => "Erro ao receber os dados.",
                "details" => $exception->getMessage()
            ], 500);
        }
    }

    public function store($request)
    {
        try {
            $plants = $this->plants->fill($request);
            $plants->save();
            $plants->beePollination()->sync($request['bee_id']);
            $plants->floweringMonths()->sync($request['month_id']);
            return response()->json([
                "message" => "A Planta foi criada com sucesso",
            ], 201);
        } catch (\Exception $exception) {
            return response()->json([
                "message" => "Erro na criação da Planta",
                "details" => $exception->getMessage()
            ], 500);
        }
    }

    public function update($request, $plantsId)
    {
        try {
            $plants = $this->getById($plantsId);
            $plants->update($request);
            $plants->save();
            if (isset($request['bee_id'])) {
                $plants->beePollination()->sync($request['bee_id']);
            }
            if (isset($request['month_id'])) {
                $plants->floweringMonths()->sync($request['month_id']);
            }
            return response()->json([
                "message" => "A Planta foi atualizada com sucesso",
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                "message" => "Erro na atualização da Planta",
                "details" => $exception->getMessage()
            ], 500);
        }
    }

    public function destroy($plantId)
    {
        try {
            $plants = $this->plants->findOrFail($plantId);
            $plants->delete();
            return response()->json([
                "message" => "A Planta foi deletada com sucesso",
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                "message" => "Erro na deleção da Planta",
                "details" => $exception->getMessage()
            ], 500);
        }
    }

}
