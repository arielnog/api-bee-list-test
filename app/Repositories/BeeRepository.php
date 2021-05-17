<?php


namespace App\Repositories;


use App\Http\Requests\BeeRequest;
use App\Models\Bee;

class BeeRepository
{
    private $bee;

    public function __construct(Bee $bee)
    {
        $this->bee = $bee;
    }

    public function listAll()
    {
        try {
            $response = $this->bee->with('pollinationPlants.floweringMonths');
            return $response;
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

    public function getById($beeId)
    {
        try {
            $response = $this->bee->withTrashed()->findOrFail($beeId);
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
            $response = $this->bee->fill($request);
            $response->save();
            return response()->json([
                "message" => "A Abelha foi criada com sucesso",
            ], 201);
        } catch (\Exception $exception) {
            return response()->json([
                "message" => "Erro na criação da Abelha",
                "details" => $exception->getMessage()
            ], 500);
        }
    }

    public function update($request, $plantsId)
    {
        try {
            $bee = $this->getById($plantsId);
            $bee->update($request);
            $bee->save();
            return response()->json([
                "message" => "A Abelha foi atualizada com sucesso",
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                "message" => "Erro na atualização da Abelha",
                "details" => $exception->getMessage()
            ], 500);
        }
    }

    public function delete($plantsId)
    {
        try {
            $bee = $this->getById($plantsId);
            $bee->delete();
            return response()->json([
                "message" => "A Abelha foi deletada com sucesso",
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                "message" => "Erro na deleção da Abelha",
                "details" => $exception->getMessage()
            ], 500);
        }
    }

}
