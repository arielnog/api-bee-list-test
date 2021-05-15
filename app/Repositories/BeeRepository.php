<?php


namespace App\Repositories;


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
        $response = $this->bee->with('pollinationPlants.floweringMonths')->get();
        return $response;
    }


    public function store($request)
    {
        try {
        $response = $this->bee->create($request);
        } catch (\Throwable $exception){

        }
    }

}
