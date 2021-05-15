<?php

namespace App\Http\Controllers;

use App\Http\Requests\BeeRequest;
use App\Models\Bee;
use App\Services\BeeService;
use Illuminate\Http\Request;

class BeeController extends Controller
{
    private $beeService;

    public function __construct(BeeService $beeService)
    {
        $this->beeService = $beeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->beeService->listAll();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BeeRequest $request)
    {
        $request->validated();
        $response = $this->beeService->store($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Bee $bee
     * @return \Illuminate\Http\Response
     */
    public function show(Bee $bee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Bee $bee
     * @return \Illuminate\Http\Response
     */
    public function edit(Bee $bee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Bee $bee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bee $bee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Bee $bee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bee $bee)
    {
        //
    }
}
