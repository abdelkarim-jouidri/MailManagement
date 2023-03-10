<?php

namespace App\Http\Controllers;

use App\Models\CourrierDepart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
        $courrier_depart =DB::table('courrier_departs')
        // ->join('type_exp_dest', 'courrier_depart.type_exp_dest_id', '=', 'courrier_depart.id')
        // ->join('destination_arrive', 'courrier_depart.destination_arrive_id', '=', 'destination_arrive.id')
        // ->join('mode_courrier', 'courrier_depart.mode_courrier_id', '=', 'mode_courrier.id')
        // ->join('type_courrier', 'courrier_depart.type_courrier_id', '=', 'type_courrier.id')
        // ->join('nature_courrier', 'courrier_depart.nature_courrier_id', '=', 'nature_courrier.id')
        // ->join('utilisateur', 'courrier_depart.utilisateur_id', '=', 'utilisateur.id')
        // ->join('mission', 'courrier_depart.mission_id', '=', 'mission.id')
        // ->join('ministre', 'courrier_depart.ministre_id', '=', 'ministre.id')
        // ->join('etablissement', 'courrier_depart.etablissement_id', '=', 'etablissement.id')
        // ->join('pays', 'courrier_depart.pays_id', '=', 'pays.id')
        ->select('courrier_departs.*')
        ->get();
        return view('pages.courrier_depart',['courrier_depart'=>$courrier_depart]);
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
    public function store(Request $request)
    {

    dd($request);
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
