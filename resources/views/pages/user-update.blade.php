<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form role="form" method="POST" action='/update/{{$user->id}}' enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Modification des informations de {{$user->nom}}</p>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Confirmer</button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                        <label for="nom" class="form-control-label">nom</label>
                                        <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" value="{{$user->nom}}" required autofocus autocomplete="off">

                                        @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                <div class="form-group">
                                        <label for="prenom" class="form-control-label">prenom</label>
                                        <input class="form-control @error('prenom') is-invalid @enderror" type="text" name="prenom" value="{{$user->prenom}}" required autofocus autocomplete="off">

                                        @error('prenom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                        <label for="email" class="form-control-label">email</label>
                                        <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{$user->email}}" required autofocus autocomplete="off">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <label for="">Départements</label>
                                    <select class="form-control" id="profil" name="profil_id">
                                        <option  value="">-- Choisir une département --</option>
                                        
                                        @foreach ($departement  as $dep )
                                        <option {{($dep->id===$user->profil_id) ? 'selected' : ''}}  value="{{ $dep->id }}">{{ $dep->name }}</option>
                                        @endforeach
                                        </select>
                                        @error('profil_id') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>

                                    <div class="flex flex-col mb-3">
                                        <label for="">Fonctions</label>
                                        <select class="form-control" id="profil" name="profil_id">
                                            <option  value="">-- Choisir une fonction --</option>
                                            
                                            @foreach ($fonctions  as $fct )
                                                <option {{($fct->id===$user->fonction_id) ? 'selected' : ''}}  value="{{ $fct->id }}">{{ $fct->name }}</option>
                                            @endforeach
                                            </select>
                                            @error('profil_id') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                <div class="form-group">
                                    <label for="old_password" class="form-control-label">Old Password</label>
                                    <input class="form-control @error('old_password') is-invalid @enderror" type="password" name="old_password" value="" required autofocus autocomplete="off">

                                    @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="new_password" class="form-control-label">New Password</label>
                                    <input class="form-control @error('new_password') is-invalid @enderror" type="password" name="new_password" value="" required autocomplete="off">

                                    @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                            </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="confirm_password" class="form-control-label">Confirm New Password</label>
                                        <input class="form-control @error('confirm_password') is-invalid @enderror" type="password" name="confirm_password" value="" required autocomplete="off">
                                        @error('confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>

                                </div>


                            </div>
                            <hr class="horizontal dark">


                        </div>
                    </form>
                </div>
            </div>

        </div>
        @include('layouts.footers.auth.footer')
    </div>
</body>
</html>