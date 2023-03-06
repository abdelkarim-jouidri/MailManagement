<?php

namespace App\Http\Controllers;

use App\Models\CourrierArrive;
use App\Http\Requests\StoreCourrierArriveRequest;
use App\Http\Requests\UpdateCourrierArriveRequest;

class CourrierArriveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'courrier Arrive';

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCourrierArriveRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourrierArriveRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourrierArrive  $courrierArrive
     * @return \Illuminate\Http\Response
     */
    public function show(CourrierArrive $courrierArrive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourrierArrive  $courrierArrive
     * @return \Illuminate\Http\Response
     */
    public function edit(CourrierArrive $courrierArrive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourrierArriveRequest  $request
     * @param  \App\Models\CourrierArrive  $courrierArrive
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourrierArriveRequest $request, CourrierArrive $courrierArrive)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourrierArrive  $courrierArrive
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourrierArrive $courrierArrive)
    {
        //
    }
}
