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

}
