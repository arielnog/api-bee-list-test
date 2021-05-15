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

    public function filter($request)
    {
        $this->plantsRepository->filter($request);
    }

    public function store($request)
    {
        return $this->plantsRepository->store($request);
    }

}
