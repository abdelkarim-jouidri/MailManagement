<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Courrier Arrive</title>
    <style>


        /* Add your styling here */
        .title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            /* margin-bottom: 20px; */
            text-decoration: underline;
        }
        #pdf_courrier_dept{
            /* margin-left:30px; */
            /* margin-right:30px; */
        }
        .row {
            /* display: flex;
            align-items: center;
            justify-content: center; */
        }
        .label {
            /* font-weight: bold; */
            /* margin:10px 0px; */

            text-align: center;
        }
        .font-bold{
            font-weight: bold;
        }


        </style>
</head>
<body>


    <div class="title">Courrier Arrive</div>

        <p class="font-bold">  Numero D'ordre : </p> {{ $courrier_arrive->first()->number }}
        <p class="font-bold">  Ref : </p> {{ $courrier_arrive->first()->ref_envoi }}
        <p class="font-bold"> Date D'envoie :</p> {{ $courrier_arrive->first()->date_envoie }}
        <p class="font-bold"> Date Arrive :</p> {{ $courrier_arrive->first()->date_arrivee }}
        <p class="font-bold"> Objet :</p> {{ $courrier_arrive->first()->objet }}
        <p class="font-bold">Type Exp :</p>{{ $courrier_arrive->first()->type_exp_dest }}
        <p class="font-bold">Destination :</p> {{ $courrier_arrive->first()->destination }}
        <p class="font-bold"> Mode :</p> {{ $courrier_arrive->first()->mode }}
        <p class="font-bold"> Type :</p> {{ $courrier_arrive->first()->type }}
        <p class="font-bold"> Etat :</p> {{ $courrier_arrive->first()->etat }}
        <p class="font-bold"> Nature :</p> {{ $courrier_arrive->first()->nature }}
        <p class="font-bold"> Detail Courrier : </p>{{ $courrier_arrive->first()->courrier_detail }}
        <p class="font-bold" > is_lu : </p>
        @if ($courrier_arrive->first()->is_lu==1)
        <p class="badge bg-success">oui</p>
        @else
        <p class="badge bg-danger">non</p>
        @endif



</html>

