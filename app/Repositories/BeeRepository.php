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

}
