<?php

namespace App\Http\Controllers;

use App\Models\CourrierArrive;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\CourrierDepart;
use Elibyy\TCPDF\Facades\TCPDF;
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
        ->join('etat_courriers', 'courrier_departs.etat_courrier_id', '=', 'etat_courriers.id')
        ->select(
        'courrier_departs.*',
        'nature_courriers.name as nature',
        'destination_arrives.name as destination',
        'mode_courriers.name as mode',
        'type_courriers.name as type',
        'type_exp_dests.name as type_exp_dest',
        'etat_courriers.name as etat',
        )
        ->where('courrier_departs.id', $id)
        ->get();

        $filename = $courrier_depart->first()->number.'.'.'pdf';



        $html = view()->make('pages.pdf_courrierdepart', ['courrier_depart'=>$courrier_depart])->render();

        $pdf = new TCPDF;

        // set some language dependent data:
$lg = Array();
$lg['a_meta_charset'] = 'UTF-8';
$lg['a_meta_dir'] = 'rtl';
$lg['a_meta_language'] = 'fa';
$lg['w_page'] = 'page';

// set some language-dependent strings (optional)
$pdf::setLanguageArray($lg);

// ---------------------------------------------------------

// set font
$pdf::SetFont('dejavusans', '', 12);

        $pdf::SetTitle('Courrier Depart');
        $pdf::AddPage();
        $pdf::writeHTML($html, true, false, true, false, '');

        $pdf::Output(public_path($filename), 'F');

        return response()->download(public_path($filename));



        // $pdf = PDF::loadView('pages.pdf_courrierdepart', ['courrier_depart'=>$courrier_depart]);

        // return $pdf->download($courrier_depart->first()->number.'.pdf');
     }

     public function  pdf_courrier_arrive($id){

        // get courrier depart
        $courrier_arrive = CourrierArrive::find($id)
        ->join('exp_dest_courriers', 'courrier_arrives.type_exp_dest_id', '=', 'exp_dest_courriers.id')
        ->join('nature_courriers', 'courrier_arrives.nature_courrier_id', '=', 'nature_courriers.id')
        ->join('mode_courriers', 'courrier_arrives.mode_courrier_id', '=', 'mode_courriers.id')
        ->join('destination_arrives', 'courrier_arrives.destination_arrive_id', '=', 'destination_arrives.id')
        ->join('type_courriers', 'courrier_arrives.type_courrier_id', '=', 'type_courriers.id')
        ->join('etat_courriers', 'courrier_arrives.etat_courrier_id', '=', 'etat_courriers.id')
        ->select(
        'courrier_arrives.*',
        'nature_courriers.name as nature',
        'exp_dest_courriers.name as expediteur',
        'destination_arrives.name as destination',
        'mode_courriers.name as mode',
        'type_courriers.name as type',
        'etat_courriers.name as etat',

        )
        ->where('courrier_arrives.id', $id)
        ->get();

        $filename = $courrier_arrive->first()->number.'.'.'pdf';



        $html = view()->make('pages.pdf_courrierArrive', ['courrier_arrive'=>$courrier_arrive])->render();

        $pdf = new TCPDF;

        // set some language dependent data:
$lg = Array();
$lg['a_meta_charset'] = 'UTF-8';
$lg['a_meta_dir'] = 'rtl';
$lg['a_meta_language'] = 'fa';
$lg['w_page'] = 'page';

// set some language-dependent strings (optional)
$pdf::setLanguageArray($lg);

// ---------------------------------------------------------

// set font
$pdf::SetFont('dejavusans', '', 12);

        $pdf::SetTitle('Courrier Arrive');
        $pdf::AddPage();
        $pdf::writeHTML($html, true, false, true, false, '');

        $pdf::Output(public_path($filename), 'F');

        return response()->download(public_path($filename));



        // $pdf = PDF::loadView('pages.pdf_courrierdepart', ['courrier_depart'=>$courrier_depart]);

        // return $pdf->download($courrier_depart->first()->number.'.pdf');
     }
}
