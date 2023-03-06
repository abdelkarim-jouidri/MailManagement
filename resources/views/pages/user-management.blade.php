@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')

    @include('layouts.navbars.auth.topnav', ['title' => 'User Management'])
    <div class="row mt-4 mx-4">
        <div class="col-12">

            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h6>Utilisateur</h6>


                    @if(Auth::user()->is_admin==1)
                   <a title="ajouter_utilisateur" href="{{ route('register')}}"> <i class="fa fa-plus"></i> </a>
                   @endif

                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table table-striped table-bordered table-hover table-sm align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Login</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Prenom</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Profil</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fonction</th>

                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Action</th>

                                </tr>
                            </thead>
                            <tbody>

                            @foreach ( $users as $user )

                                <tr>

                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$user->login}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$user->email}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$user->prenom}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$user->nom}}</p>
                                    </td>
                                    @if($user->is_admin==1)
                                    <td>

                                        <p title="admin" class="text-sm badge bg-secondary font-weight-bold mb-0"><i class="fa fa-key"></i></p>

                                    </td>
                                    @else
                                    <td>

                                        <p title="utilisateur" class="text-sm badge bg-success font-weight-bold mb-0"><i class="fa fa-user"></i></p>

                                    </td>
                                    @endif
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$user->profil}}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$user->fonction}}</p>
                                    </td>

                                    <td class="align-middle text-end">
                                        <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                            <a title="editer" href="/update/{{$user->id}}" class="text-sm btn btn-warning font-weight-bold mb-0 me-1 "><i class="far fa-edit " aria-hidden="true"></i></a>
                                            <a title="supprimer" href="/delete/{{$user->id}}" class="text-sm btn btn-danger font-weight-bold mb-0 me-1"><i class="far fa-trash-alt " aria-hidden="true"></i></a>
                                            @if($user->is_admin==1)
                                            <a title="changer_role" href="{{ route('change-role',['id'=>$user->id,'is_admin'=>$user->is_admin]) }}"  class="text-sm btn btn-dark font-weight-bold mb-0 "><i class="fa fa-lock" aria-hidden="true"></i></a>
                                            @else
                                            <a title="changer_role" href="{{ route('change-role',['id'=>$user->id,'is_admin'=>$user->is_admin]) }}" class="text-sm btn btn-white font-weight-bold mb-0 "><i class="fa fa-unlock" aria-hidden="true"></i></a>
                                            @endif
                                        </div>
                                    </td>
                              
                                </tr>


                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(session('delete'))
                            <div class="d-flex justify-content-center">
                                <div class="alert alert-success w-75 fs d-flex justify-content-between" role="alert">
                                    <small class="text-white fw-bold">{{ session('delete') }}</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
    @endif
@endsection
