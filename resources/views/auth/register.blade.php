
@extends('layouts.app')

@section('content')
    @include('layouts.navbars.guest.navbar')

    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
            <span class="mask bg-gradient-dark opacity-6"></span>

        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4 pb-0">
                            <div class="text-center">
                                <svg  width="82px" height="82px" viewBox="-1.92 -1.92 27.84 27.84" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 7.00005L10.2 11.65C11.2667 12.45 12.7333 12.45 13.8 11.65L20 7" stroke="#000000" stroke-width="0.264" stroke-linecap="round" stroke-linejoin="round"></path> <rect x="3" y="5" width="18" height="14" rx="2" stroke="#000000" stroke-width="0.264" stroke-linecap="round"></rect> </g></svg>

                            </div>
                            <h5> Création du Compte</h5>
                        </div>
                        @if(session('success'))
                            <div class="d-flex justify-content-center">
                                <div class="alert alert-success w-75 fs" role="alert">
                                    <small class="text-white fw-bold">{{ session('success') }}</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        @endif
                        <div class="card-body">
                            <form role="form" method="POST" action="{{ route('register.perform') }}">
                                @csrf
                                @method('post')
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="login" class="form-control" placeholder="Nom d'utilisateur" aria-label="Name" value="{{ old('login') }}" >
                                    @error('login') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="nom" class="form-control" placeholder="nom" aria-label="Name" value="{{ old('nom') }}" >
                                    @error('nom') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="prenom" class="form-control" placeholder="prenom" aria-label="Name" value="{{ old('prenom') }}" >
                                    @error('prenom') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" value="{{ old('email') }}" >
                                    @error('email') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password">
                                    @error('password') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <select class="form-control" id="profil" name="profil_id">
                                        <option selected value="">-- Choisir une département --</option>
                                        @foreach ($departement  as $dep )
                                        <option   value="{{ $dep->id }}">{{ $dep->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('profil_id') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <select class="form-control" id="fonction" name="fonction_id">
                                        <option selected value="">-- Choisir une fonction --</option>
                                        @foreach ($fonctions  as $fct )
                                        <option   value="{{ $dep->id }}">{{ $fct->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('fonction_id') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>


                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Crée Compte</button>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('home') }}" class="btn bg-gradient-secondary w-100 my-1 mb-2"><i class="fa fa-hand-o-left" aria-hidden="true"></i></a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('layouts.footers.guest.footer')
@endsection
