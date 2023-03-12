<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourrierDepart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        $credentials = $request->validate([
            'numero_ordre' => ['required', 'unique:courrier_departs,number'],
            'date_envoie' => 'required|date|after:today',
            'type_exp_dest_id' => 'required',
            'nature_courrier_id' => 'required',
            'objet' => 'required',
            'courrier_detail' => 'required|min:5',
            'etat_courrier_id'=>'required',
            'mode_courrier_id'=>'required',
            'destination_arrive_id'=>'required',
            'pdf_file'=>'required|mimes:pdf',

        ]);


        $pdfFile = $request->file('pdf_file');

        if ($pdfFile) {
            $pdfFileName = $pdfFile->getClientOriginalName();
            Storage::putFileAs('pdf', $pdfFile, $pdfFileName);
           $pdf_file= $pdfFile->getContent();

           DB::table('courrier_departs')->insert([

           'number' => $credentials['numero_ordre'],
            'date_envoie' => $credentials['date_envoie'],
            'type_exp_dest_id' =>$credentials['type_exp_dest_id'] ,
            'nature_courrier_id' => $credentials['nature_courrier_id'],
            'objet' => $credentials['objet'],
            'courrier_detail' => $credentials['courrier_detail'],
            'etat_courrier_id'=>$credentials['etat_courrier_id'],
            'mode_courrier_id'=>$credentials['mode_courrier_id'],
            'destination_arrive_id'=>$credentials['destination_arrive_id'],
            'pdf_file'=>$credentials['pdf_file'],
            'utilisateur_id'=>Auth::user()->id,

            'type_courrier_id'=>1,
            'pays_id'=>1,
            'etudiant'=>0,
            'is_rep'=>0,
            'date_rep'=>now(),
            'is_lu'=>0,
        ]);

        return 'success';

        } else {
            return 'error in pdf';
        }
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
