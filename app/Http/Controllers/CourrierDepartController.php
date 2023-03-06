<?php

namespace App\Http\Controllers;

use App\Models\CourrierDepart;
use App\Http\Requests\StoreCourrierDepartRequest;
use App\Http\Requests\UpdateCourrierDepartRequest;

class CourrierDepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'courrier depart';
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
     * @param  \App\Http\Requests\StoreCourrierDepartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourrierDepartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourrierDepart  $courrierDepart
     * @return \Illuminate\Http\Response
     */
    public function show(CourrierDepart $courrierDepart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourrierDepart  $courrierDepart
     * @return \Illuminate\Http\Response
     */
    public function edit(CourrierDepart $courrierDepart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourrierDepartRequest  $request
     * @param  \App\Models\CourrierDepart  $courrierDepart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourrierDepartRequest $request, CourrierDepart $courrierDepart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourrierDepart  $courrierDepart
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourrierDepart $courrierDepart)
    {
        //
    }
}
