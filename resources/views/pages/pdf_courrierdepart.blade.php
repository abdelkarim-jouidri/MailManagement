<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Courrier Depart</title>
    <style>
        /* Add your styling here */
        .title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            text-decoration: underline;
        }
        #pdf_courrier_dept{
            /* margin-left:30px; */
            margin-right:30px;
        }
        .row {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .label {
            /* font-weight: bold; */
            margin:10px 0px;

            text-align: start;
        }
        .font-bold{
            font-weight: bold;
        }


        </style>
</head>
<body>


    <div class="title">Courrier Depart</div>

<div id="pdf_courrier_dept">

        <div class="label">
            <span class="font-bold">  Numero D'ordre : </span> {{ $courrier_depart->first()->number }} </div>


    <div class="row">
        <div class="label"> <span class="font-bold"> Date D'envoie :</span> {{ $courrier_depart->first()->date_envoie }}</div>

    </div>
    <div class="row">
        <div class="label"> <span class="font-bold"> Objet :</span> {{ $courrier_depart->first()->objet }}</div>

    </div>
    <div class="row">
        <div class="label"><span class="font-bold">Type Exp :</span> {{ $courrier_depart->first()->type_exp_dest }}</div>

    </div>
    <div class="row">
        <div class="label"> <span class="font-bold">Destination :</span>  {{ $courrier_depart->first()->destination }}</div>

    </div>
    <div class="row">
        <div class="label"> <span class="font-bold"> Mode :</span> {{ $courrier_depart->first()->mode }}</div>

    </div>
    <div class="row">
        <div class="label"> <span class="font-bold"> Type :</span> {{ $courrier_depart->first()->type }}</div>

    </div>

    <div class="row">
        <div class="label"> <span class="font-bold"> Nature :</span> {{ $courrier_depart->first()->nature }}</div>
        <div class="content"></div>
    </div>

    <div class="row">
        <div class="label"> <span class="font-bold" > is_lu : </span>
            @if ($courrier_depart->first()->is_lu==1)
            <span class="badge bg-success">oui</span>
            @else
            <span class="badge bg-danger">non</span>
            @endif

        </div>

    </div>

    <div class="row">
        <div class="label">
             <span class="font-bold"> Detail Courrier : </span>{{ $courrier_depart->first()->courrier_detail }}
            </div>

    </div>
</div>
</html>

