@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')

    @include('layouts.navbars.auth.topnav', ['title' => 'Courrier Depart'])

    <div class="row mt-4 mx-4">
        <div class="col-12">

            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h6>Courrier Depart</h6>


                    {{-- @if(Auth::user()->is_admin==1) --}}
                   <a title="ajouter_courrier_depart" href="#"> <i class="fa fa-plus"></i> </a>
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
    @endsection
