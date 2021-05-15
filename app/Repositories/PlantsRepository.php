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

    public function filter($request)
    {
        $plants = $this->plants
            ->with(['floweringMonths' =>
                function ($query) use ($request) {
                    $query->orWhere('floweringMonths.name', 'like', '%' . $request['filter'] . '%');
                }],
                ['beePollination' =>
                    function ($query) use ($request) {
                        $query->orWhere('beePollination.name', 'like', '%' . $request['filter'] . '%');
                    }])
            ->get();
        dd($plants);
    }

    public function store($request)
    {
        $plants = $this->plants->fill($request);
        $plants->save();
        $plants->beePollination()->sync($request['bee_id']);
        $plants->floweringMonths()->sync($request['month_id']);
        dd($plants);

    }

}
