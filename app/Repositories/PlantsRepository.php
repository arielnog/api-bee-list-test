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
        try {
            $response = $this->plants->with('floweringMonths', 'beePollination')->get();
        } catch (\Throwable $exception) {
            $response = $exception->getMessage();
        }
    }

    public function store($request)
    {
        try {

        } catch (\Throwable $exception) {

        }
    }

}
