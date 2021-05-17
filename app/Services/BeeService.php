<?php


namespace App\Services;


use App\Repositories\BeeRepository;

class BeeService
{
    private $beeRepository;

    public function __construct(BeeRepository $beeRepository)
    {
        $this->beeRepository = $beeRepository;
    }

    public function listAll()
    {
        try {
            $response = $this->beeRepository->listAll()->get();
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

    public function store($request)
    {
        return $this->beeRepository->store($request);
    }

    public function update($request, $beeId)
    {
        return $this->beeRepository->update($request, $beeId);
    }

    public function destroy($beeId)
    {
        return $this->beeRepository->destroy($beeId);
    }

}
