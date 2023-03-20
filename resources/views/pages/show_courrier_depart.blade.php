<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>View Courrier</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<div class="container py-4">
    <div class="col-lg-10 offset-1">
        <div class="card h-100">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0">Courrier Depart</h6>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('pdf_courrier_depart',['id'=>$courrier_depart->first()->id]) }}" class="btn btn-outline-primary btn-sm mb-1 "><i class="fa-solid fa-file-pdf"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body  p-3 pb-0">

                <div class="d-flex justify-content-between align-items-center">
                    <div> <p>Numero D'ordre :</p>  </div>
                    <div><p>{{$courrier_depart->first()->number}}</p></div>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <div> <p>Date D'envoie :</p>  </div>
                    <div><pre>{{ $courrier_depart->first()->date_envoie }}</pre></div>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <div> <p>Objet :</p>  </div>
                    <div><p>{{ $courrier_depart->first()->objet }}</p></div>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <div> <p>Type Exp  :</p>  </div>
                    <div><p>{{ $courrier_depart->first()->type_exp_dest }}</p></div>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <div> <p>Destination :</p>  </div>
                    <div><p>{{ $courrier_depart->first()->destination }}</p></div>
                </div>


                <div class="d-flex justify-content-between align-items-center">
                    <div> <p>Mode :</p>  </div>
                    <div><p>{{ $courrier_depart->first()->mode }}</p></div>
                </div>


                <div class="d-flex justify-content-between align-items-center">
                    <div> <p>Type :</p>  </div>
                    <div><p>{{ $courrier_depart->first()->type }}</p></div>
                </div>


                <div class="d-flex justify-content-between align-items-center">
                    <div> <p>Nature :</p>  </div>
                    <div><p>{{ $courrier_depart->first()->nature }}</p></div>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <div> <p>Lu :</p>  </div>
                    <div>
                        @if ($courrier_depart->first()->is_lu==1)
                        <p class="badge bg-success">oui</p>
                        @else
                        <p class="badge bg-danger">non</p>
                        @endif
                    </div>
                </div>




                <div class="d-flex justify-content-between align-items-center">
                    <div> <p>Courrier Detail :</p>  </div>
                    <div><p>{{ $courrier_depart->first()->courrier_detail }}</p></div>
                </div>


            </div>
        </div>
    </div>
    <div class="d-flex align-items-center justify-content-center my-3">
        <a href="{{ route('courrier-depart') }}" class="btn text-white  bg-secondary w-50 my-1 mb-2"><i class="fa-solid fa-arrow-left"></i></a>


    </div>
    </div>
</body>
</html>
