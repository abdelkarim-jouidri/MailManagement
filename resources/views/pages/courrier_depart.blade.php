@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')

@include('layouts.navbars.auth.topnav', ['title' => 'Courrier Depart'])

<div class="row mt-4 mx-4">
    <div class="col-12">

        <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6>Courrier Depart</h6>


                {{-- @if(Auth::user()->is_admin==1) --}}
                <a type="button" data-bs-toggle="modal" data-bs-target="#ajouter_courrier" title="ajouter_courrier_depart" href="#"> <i class="fa fa-plus"></i> </a>
                {{-- @endif --}}

            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table table-striped table-bordered table-hover table-sm align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Number</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date_Envoie</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Dest_Arrive</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Utilisateur</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">is_rep</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">is_lu</th>


                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            {{-- @foreach ( $users as $user ) --}}

                            <tr>

                                <td>
                                    <p class="text-sm font-weight-bold mb-0">1</p>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">1</p>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">1</p>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">1</p>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">1</p>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">1</p>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">1</p>
                                </td>







                                <td class="align-middle text-end">
                                    <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                        <a title="supprimer" href="#" class="text-sm btn btn-warning font-weight-bold mb-0 me-1 "><i class="far fa-edit " aria-hidden="true"></i></a>
                                        <a title="editer" href="#" class="text-sm btn btn-danger font-weight-bold mb-0 me-1"><i class="far fa-trash-alt " aria-hidden="true"></i></a>


                                    </div>
                                </td>

                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- MOdal add Courrier Depart --}}

<div class="modal fade" id="ajouter_courrier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="text-center text-decoration-underline mt-2 fw-bold">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter Courrier Depart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="{{ route('ajouter.courrier-depart') }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="container">
                        {{-- Num D'ordre --}}
                        <div class="row flex align-items-center ">
                            <div class="col-4">
                                <label for="numero_ordre">Numéro d'ordre :</label>
                            </div>
                            <div class="col-8">
                                <input type="text" value="{{
                               now()->year.''.rand(10000,99999)
                            }}" class="form-control" id="numero_ordre" name="numero_ordre" readonly required>
                                   @error('numero_ordre') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                            </div>

                        </div>
                        {{-- Date D'envoi --}}

                        <div class="row flex align-items-center my-3">
                            <div class="col-4">
                                <label for="date_envoie">Date Envoie :</label>
                            </div>
                            <div class="col-8">
                                <input type="datetime-local" class="form-control" id="date_envoie" name="date_envoie" min="{{ date('Y-m-d\TH:i', strtotime('+1 hour')) }}" required>

                            </div>

                        </div>
                        {{-- Expéditeur --}}
                        <div class="row flex align-items-center my-3">
                            <div class="col-4">
                                <label for="type_exp_dest_id" _>Expéditeur :</label>
                            </div>
                            <div class="col-8">
                                <select class="form-select form-select-sm" name="type_exp_dest_id" id="type_exp_dest_id" aria-label=".form-select-sm example" required>
                                    <option disabled selected>type_exp_dest</option>
                                    <option value="1">One</option>
                                </select>
                            </div>

                        </div>
                        {{-- Nature Courrier --}}
                        <div class="row flex align-items-center my-3">
                            <div class="col-4">
                                <label for="nature_courrier_id" _>Nature courrier :</label>
                            </div>
                            <div class="col-8">
                                <select class="form-select form-select-sm" name="nature_courrier_id" id="nature_courrier_id" aria-label=".form-select-sm example" required>
                                    <option disabled selected>Nature courrier</option>
                                    <option value="1">One</option>
                                </select>
                            </div>

                        </div>
                        {{-- Objet --}}
                        <div class="row flex align-items-center my-3">
                            <div class="col-4">
                                <label for="objet">Objet :</label>
                            </div>
                            <div class="col-8">
                                <select class="form-select form-select-sm" name="objet" id="objet" aria-label=".form-select-sm example" required>
                                    <option disabled selected> Select Objet</option>
                                    <option value="1">One</option>
                                </select>

                            </div>

                        </div>
                        {{-- Détail du courrier --}}
                        <div class="row flex align-items-center my-3">
                            <div class="col-4">
                                <label for="courrier_detail">Détail du courrier :</label>
                            </div>
                            <div class="col-8">
                                <textarea name="courrier_detail" class="form-control" id="courrier_detail" rows="3" required></textarea>

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
                                    <option value="1">One</option>
                                </select>

                            </div>

                        </div>
                        {{-- mode de deaprt du courrier --}}
                        <div class="row flex align-items-center my-3">
                            <div class="col-4">
                                <label for="mode_courrier_id">Mode de départ :</label>
                            </div>
                            <div class="col-8">
                                <select class="form-select form-select-sm" name="mode_courrier_id" id="mode_courrier_id" aria-label=".form-select-sm example" required>
                                    <option disabled selected>mode_courrier</option>
                                    <option value="1">One</option>
                                </select>

                            </div>

                        </div>
                        {{-- Destination du courrier --}}
                        <div class="row flex align-items-center my-3">
                            <div class="col-4">
                                <label for="destination_arrive_id">Destination :</label>
                            </div>
                            <div class="col-8">
                                <select class="form-select form-select-sm" name="destination_arrive_id" id="destination_arrive_id" aria-label=".form-select-sm example" required>
                                    <option disabled selected>destination_arrive</option>
                                    <option value="1">One</option>
                                </select>

                            </div>

                        </div>
                        {{-- Scann du courrier --}}
                        <div class="row flex align-items-center my-3">
                            <div class="col-4">
                                <label for="pdf_file">Scanne <span class="text-danger">*</span> (pdf):</label>
                            </div>
                            <div class="col-8">
                                <input type="file" class="form-control" id="pdf_file" name="pdf_file" required>
                                @error('pdf_file') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror


                            </div>

                        </div>



                    </div>
            </div>
            <div class="modal-footer">
                <button title="annuler" type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-close"></i></button>
                <button title="ajouter" type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>

        </div>
    </div>
</div>
@endsection

