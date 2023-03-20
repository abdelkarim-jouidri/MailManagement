<?php

namespace App\Http\Controllers;

use App\Models\CourrierArrive;
use Illuminate\Support\Facades\DB;
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

        $courrier_arrive =DB::table('courrier_arrives')
        ->join('exp_dest_courriers', 'courrier_arrives.type_exp_dest_id', '=', 'exp_dest_courriers.id')
        ->join('nature_courriers', 'courrier_arrives.nature_courrier_id', '=', 'nature_courriers.id')
        ->join('mode_courriers', 'courrier_arrives.mode_courrier_id', '=', 'mode_courriers.id')
        ->join('destination_arrives', 'courrier_arrives.destination_arrive_id', '=', 'destination_arrives.id')
        ->join('type_courriers', 'courrier_arrives.type_courrier_id', '=', 'type_courriers.id')
        ->select(
        'courrier_arrives.*',
        'nature_courriers.name as nature',
        'exp_dest_courriers.name as expediteur',
        'destination_arrives.name as destination',
        'mode_courriers.name as mode',
        'type_courriers.name as type',
        )
        ->get();
        return view('pages.courrier_arrive',['courrier_arrive'=>$courrier_arrive]);


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
