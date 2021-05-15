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
        return $this->beeRepository->listAll();
    }

    public function store($request)
    {
        return $this->beeRepository->store();
    }

}
