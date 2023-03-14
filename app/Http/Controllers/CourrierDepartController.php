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
        ->join('type_exp_dests', 'courrier_departs.type_exp_dest_id', '=', 'type_exp_dests.id')
        ->join('destination_arrives', 'courrier_departs.destination_arrive_id', '=', 'destination_arrives.id')
        ->join('mode_courriers', 'courrier_departs.mode_courrier_id', '=', 'mode_courriers.id')
        ->join('type_courriers', 'courrier_departs.type_courrier_id', '=', 'type_courriers.id')
        ->join('nature_courriers', 'courrier_departs.nature_courrier_id', '=', 'nature_courriers.id')
        ->select(
        'courrier_departs.*',
        'nature_courriers.name as nature',
        'destination_arrives.name as destination',
        'mode_courriers.name as mode',
        'type_courriers.name as type',
        )
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


        // $pdfFile = $request->file('pdf_file');
        //     $pdfFileName = $pdfFile->getClientOriginalName();
        //     Storage::putFileAs('pdf', $pdfFile, $pdfFileName);
        //    $pdf_file= $pdfFile->getContent();
        $pdf_file =$request->pdf_file;
        $pdf_file_name=time().'.'.$pdf_file->getClientOriginalExtension();
        $request->pdf_file->move('assets',$pdf_file_name);

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
            'pdf_file'=>$pdf_file_name,
            'utilisateur_id'=>Auth::user()->id,

            'type_courrier_id'=>1,
            'pays_id'=>1,
            'etudiant'=>0,
            'is_rep'=>0,
            'date_rep'=>now(),
            'is_lu'=>0,
        ]);

        return redirect()->back();
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
