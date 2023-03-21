<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;
use App\Models\CourrierDepart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCourrierDepartRequest;
use App\Http\Requests\UpdateCourrierDepartRequest;
use Barryvdh\DomPDF\PDF as DomPDFPDF;

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
            'objet' => 'required|min:5|max:255',
            'courrier_detail' => 'required|min:5',
            'etat_courrier_id'=>'required',
            'mode_courrier_id'=>'required',
            'destination_arrive_id'=>'required',
            'pdf_file'=>'required|mimes:pdf',

        ]);


        $pdf_file =$request->pdf_file;
        $pdf_file_name=time().'.'.$pdf_file->getClientOriginalExtension();
        $request->pdf_file->move('assets/pdf_courrier_dept',$pdf_file_name);

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

       return back()->with('ajoute','Courrier a été bien Ajouter');;
    }

    public function download_pdf(Request $request,$file){

    return response()->download(public_path('assets/pdf_courrier_dept/'.$file));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourrierDepart  $courrierDepart
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // get courrier depart
        $courrier_depart = CourrierDepart::find($id)
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
        'type_exp_dests.name as type_exp_dest',
        )
        ->where('courrier_departs.id', $id)
        ->get();

        // dd($courrier_depart);


        if($courrier_depart->first()->is_lu==0){
            $courrier_depart->first()->update([
                'is_lu'=>1
            ]);
        }

        return view('pages.show_courrier_depart',['courrier_depart'=>$courrier_depart]);





    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourrierDepart  $courrierDepart
     * @return \Illuminate\Http\Response
     */
    public function edit(CourrierDepart $courrierDepart)
    {
        $expediteur = DB::table('type_exp_dests')->get();
        $dest_arrive = DB::table('destination_arrives')->get();
        $mode_courrier = DB::table('mode_courriers')->get();
        $type_courrier = DB::table('type_courriers')->get();
        $nature_courriers = DB::table('nature_courriers')->get();
        $etat_courriers = DB::table('etat_courriers')->get();

        
        // dd($expediteur);

        return view('pages.courrier_depart_edit', 
            [
                'courrier'=>$courrierDepart ,
                 'expediteurs'=>$expediteur ,
                'dest_arrives'=>$dest_arrive,
                'mode_courriers'=>$mode_courrier,
                'type_courrier'=>$type_courrier,
                'nature_courriers'=>$nature_courriers,
                'etat_courriers'=>$etat_courriers
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourrierDepartRequest  $request
     * @param  \App\Models\CourrierDepart  $courrierDepart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourrierDepart $courrierDepart)
    {
        $fields = $request->validate([
            'number' => ['required', 'unique:courrier_departs,number,'.$courrierDepart->id],
            'date_envoie' => 'required|date|after:today',
            'type_exp_dest_id' => 'required',
            'nature_courrier_id' => 'required',
            'objet' => 'required|min:5|max:255',
            'courrier_detail' => 'required|min:5',
            'etat_courrier_id'=>'required',
            'mode_courrier_id'=>'required',
            'destination_arrive_id'=>'required',
            'pdf_file'=>'nullable|mimes:pdf',
        ]);

        if($request->hasFile('pdf_file')){
            $pdf_file =$request->pdf_file;
            $pdf_file_name=time().'.'.$pdf_file->getClientOriginalExtension();
            $request->pdf_file->move('assets/pdf_courrier_dept',$pdf_file_name);
            $fields['pdf_file'] = $pdf_file_name;
        }
        $courrierDepart->update($fields);
        return back()->with('update','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourrierDepart  $courrierDepart
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourrierDepart $courrierDepart)
    {
        $courrierDepart->delete();
        return back()->with('delete','Courrier a été bien supprimé');
    }

}
