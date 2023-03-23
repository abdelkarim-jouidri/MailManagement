<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourrierArrive;
use App\Rules\GreaterThanSendDate;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
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

        // get courrier arrive
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
                // get nature de courrier arrive
                $nature_courriers = DB::table('nature_courriers')->get();

                // get expediteur de courrier arrive
                $expediteurs = DB::table('exp_dest_courriers')->get();

                 // get destination de courrier arrive
                 $destinations = DB::table('destination_arrives')->get();

                  // get mode de courrier arrive
                  $modes = DB::table('mode_courriers')->get();

                    // get type de courrier arrive
        $type_courriers = DB::table('type_courriers')->get();

// get etat
$etat_courriers = DB::table('etat_courriers')->get();


        return view('pages.courrier_arrive',[
            'courrier_arrive'=>$courrier_arrive,
        'nature_courriers'=>$nature_courriers,
        'expediteurs'=>$expediteurs,
        'destinations'=>$destinations,
        'modes'=>$modes,
        'type_courriers'=>$type_courriers,
        'etat_courriers'=>$etat_courriers


    ]);


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
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'numero_ordre' => ['required', 'unique:courrier_arrives,number'],
            'date_envoie' => 'required',
            'date_arrivee' =>['required',new GreaterThanSendDate],
            'ref_envoi' => 'required|min:5|max:25',
            'type_exp_dest_id' => 'required',
            'nature_courrier_id' => 'required',
            'objet' => 'required|min:5|max:255',
            'courrier_detail' => 'required|min:5',
            'etat_courrier_id'=>'required',
            'mode_courrier_id'=>'required',
            'type_courrier_id'=>'required',
            'destination_arrive_id'=>'required',
            'pdf_file'=>'required|mimes:pdf',

        ]);


        $pdf_file =$request->pdf_file;
        $pdf_file_name=time().'.'.$pdf_file->getClientOriginalExtension();
        $request->pdf_file->move('assets/pdf_courrier_arrive',$pdf_file_name);

           DB::table('courrier_arrives')->insert([

           'number' => $credentials['numero_ordre'],
            'date_envoie' => $credentials['date_envoie'],
            'date_arrivee' => $credentials['date_arrivee'],
            'ref_envoi' => $credentials['ref_envoi'],
            'type_exp_dest_id' =>$credentials['type_exp_dest_id'] ,
            'nature_courrier_id' => $credentials['nature_courrier_id'],
            'objet' => $credentials['objet'],
            'courrier_detail' => $credentials['courrier_detail'],
            'etat_courrier_id'=>$credentials['etat_courrier_id'],
            'mode_courrier_id'=>$credentials['mode_courrier_id'],
            'type_courrier_id'=>$credentials['type_courrier_id'],
            'destination_arrive_id'=>$credentials['destination_arrive_id'],
            'pdf_file'=>$pdf_file_name,
            'utilisateur_id'=>Auth::user()->id,

            'pays_id'=>1,
            'etudiant'=>0,
            'is_rep'=>0,
            'date_rep'=>now(),
            'is_lu'=>0,
        ]);

       return back()->with('ajoute','Courrier a été bien Ajouter')->withInput();
    }



    public function download_pdf(Request $request,$file){

        return response()->download(public_path('assets/pdf_courrier_arrive/'.$file));

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
