<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification de courrier du départ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class=" bg-light bg-gradient">

<div class="d-flex justify-content-center align-items-center ">
  <div class="md:grid md:grid-cols-1 md:gap-6 w-50 border rounded mt-3 bg-white">
   
    <div class="mt-5 ">
        @if(session('update'))
            <div class="d-flex justify-content-center">
                <div class="alert alert-success w-75 fs d-flex justify-content-between" role="alert">
                        <small class="text-white fw-bold">{{ session('update') }}</small>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
      <form action="/modifier_courrier_depart/{{$courrier->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="container">

                        {{-- Num D'ordre --}}
                        <div class="row flex align-items-center ">
                            <div class="col-4">
                                <label for="numero_ordre">Numéro d'ordre :</label>
                          </div>
                            <div class="col-8">
                                <input type="text" value="{{$courrier->number}}" class="form-control" id="numero_ordre" name="numero_ordre" readonly required>
                                   @error('numero_ordre') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                            </div>

                        </div>
                        {{-- Date D'envoi --}}

                        <div class="row flex align-items-center my-3">
                            <div class="col-4">
                                <label for="date_envoie">Date Envoie :</label>
                            </div>
                            <div class="col-8">
                                <input value="{{$courrier->date_envoie}}" type="datetime-local" class="form-control" id="date_envoie" name="date_envoie" min="{{ date('Y-m-d\TH:i', strtotime('+1 minute')) }}" required>
                                @error('date_envoie') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror

                            </div>

                        </div>
                        {{-- Expéditeur --}}
                        <div class="row flex align-items-center my-3">
                            <div class="col-4">
                                <label for="type_exp_dest_id" _>Expéditeur :</label>
                            </div>
                            <div class="col-8">
                                <select class="form-select form-select-sm" name="type_exp_dest_id" id="type_exp_dest_id" aria-label=".form-select-sm example" required>
                                    <option value="">type_exp_dest</option>
                                    @foreach ($expediteurs as $expediteur)
                                     <option {{($expediteur->id===$courrier->type_exp_dest_id) ? 'selected' : ''}}  value="{{ $expediteur->id }}">{{ $expediteur->name }}</option>
                                    @endforeach
                                </select>
                                @error('type_exp_dest_id') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror

                            </div>

                        </div>
                        {{-- Nature Courrier --}}
                        <div class="row flex align-items-center my-3">
                            <div class="col-4">
                                <label for="nature_courrier_id" _>Nature courrier :</label>
                            </div>
                            <div class="col-8">
                                <select class="form-select form-select-sm" name="nature_courrier_id" id="nature_courrier_id" aria-label=".form-select-sm example" required>
                                    <option value="">Nature courrier</option>
                                    @foreach ($nature_courriers as $nature_courrier)
                                     <option {{($nature_courrier->id===$courrier->nature_courrier_id) ? 'selected' : ''}}  value="{{ $nature_courrier->id }}">{{ $nature_courrier->name }}</option>
                                    @endforeach
                                </select>
                                @error('nature_courrier_id') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror

                            </div>

                        </div>
                        {{-- Objet --}}
                        <div class="row flex align-items-center my-3">
                            <div class="col-4">
                                <label for="objet">Objet :</label>
                            </div>
                            <div class="col-8">
                                <textarea name="objet" class="form-control" id="objet" rows="3" required >{{$courrier->objet}}</textarea>
                                @error('objet') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror

                            </div>

                        </div>



                        {{-- Détail du courrier --}}
                        <div class="row flex align-items-center my-3">
                            <div class="col-4">
                                <label for="courrier_detail">Détail du courrier :</label>
                            </div>
                            <div class="col-8">
                                <textarea name="courrier_detail" class="form-control" id="courrier_detail" rows="3" required>{{$courrier->courrier_detail}}</textarea>
                                @error('courrier_detail') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror

                            </div>

                        </div>
                        {{-- etat courrier --}}
                        <div class="row flex align-items-center my-3">
                            <div class="col-4">
                                <label for="etat_courrier_id">Etat Courrier :</label>
                            </div>
                            <div class="col-8">
                                <select class="form-select form-select-sm" name="etat_courrier_id" id="etat_courrier_id" aria-label=".form-select-sm example" required>
                                    <option disabled selected>etat_courrier</option>
                                    @foreach ($etat_courriers as $etat_courrier)
                                     <option {{($etat_courrier->id===$courrier->etat_courrier_id) ? 'selected' : ''}}  value="{{ $etat_courrier->id }}">{{ $etat_courrier->name }}</option>
                                    @endforeach
                                </select>
                                @error('etat_courrier_id') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror

                            </div>

                        </div>
                        {{-- mode de deaprt du courrier --}}
                        <div class="row flex align-items-center my-3">
                            <div class="col-4">
                                <label for="mode_courrier_id">Mode de départ :</label>
                            </div>
                            <div class="col-8">
                                <select class="form-select form-select-sm" name="mode_courrier_id" id="mode_courrier_id" aria-label=".form-select-sm example" required>
                                    <option value="">mode_courrier</option>
                                    @foreach ($mode_courriers as $mode_courrier)
                                     <option {{($mode_courrier->id===$courrier->mode_courrier_id) ? 'selected' : ''}}  value="{{ $mode_courrier->id }}">{{ $mode_courrier->name }}</option>
                                    @endforeach
                                </select>
                                @error('mode_courrier_id') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror

                            </div>

                        </div>
                        {{-- Destination du courrier --}}
                        <div class="row flex align-items-center my-3">
                            <div class="col-4">
                                <label for="destination_arrive_id">Destination :</label>
                            </div>
                            <div class="col-8">
                                <select class="form-select form-select-sm" name="destination_arrive_id" id="destination_arrive_id" aria-label=".form-select-sm example" required>
                                    <option value="">destination_arrive</option>
                                    @foreach ($dest_arrives as $dest_arrive)
                                     <option {{($dest_arrive->id===$courrier->destination_arrive_id) ? 'selected' : ''}}  value="{{ $dest_arrive->id }}">{{ $dest_arrive->name }}</option>
                                    @endforeach
                                </select>
                                @error('destination_arrive_id') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror

                            </div>

                        </div>
                        {{-- Scann du courrier --}}
                        <div class="row flex align-items-center my-3">
                            <div class="col-4">
                                <label for="pdf_file">Scanne <span class="text-danger">*</span> (pdf):</label>
                            </div>
                            <div class="col-8">
                                <input type="file" class="form-control" id="pdf_file" name="pdf_file" >
                                @error('pdf_file') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror


                            </div>

                        </div>



                    </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button title="ajouter" type="submit" class="btn btn-primary">Appliquer les changements </button>
            </div>
     
      </form>
    </div>
  </div>
</div>

<div class="hidden sm:block" aria-hidden="true">
  <div class="py-5">
    <div class="border-t border-gray-200"></div>
  </div>
</div>
    
</body>
</html>