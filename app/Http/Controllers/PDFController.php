<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\CourrierDepart;

class PDFController extends Controller
{
    public function  pdf_courrier_depart($id){


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



        $pdf = PDF::loadView('pages.pdf_courrierdepart', ['courrier_depart'=>$courrier_depart]);

        return $pdf->download($courrier_depart->first()->number.'.pdf');
     }
}
