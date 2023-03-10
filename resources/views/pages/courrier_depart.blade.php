@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')

    @include('layouts.navbars.auth.topnav', ['title' => 'Courrier Depart'])

    <div class="row mt-4 mx-4">
        <div class="col-12">

            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h6>Courrier Depart</h6>


                    {{-- @if(Auth::user()->is_admin==1) --}}
                   <a type="button"  data-bs-toggle="modal" data-bs-target="#ajouter_courrier" title="ajouter_courrier_depart" href="#"> <i class="fa fa-plus"></i> </a>
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
                <form role="form" method="POST" action="{{ route('ajouter.courrier-depart') }}">
                    @csrf
                    @method('post')
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <label for="objet">Objet :</label>
                            <textarea name="objet" class="form-control" id="objet"  rows="1" required></textarea>

                          </div>
                    </div>
                    <div class="row">

                      <div class="col">
                        <label for="number">Reference d’envoi</label>
                        <input type="text" value="" class="form-control" id="number" name="number" required >
                      </div>
                      <div class="col">
                        <label for="dateenvoie"_>Date Envoie</label>
                        <input type="datetime-local"  class="form-control" id="date_envoie" name="date_envoie" min="{{ date('Y-m-d\TH:i', strtotime('+1 hour')) }}" required >
                      </div>
                      <div class="col">
                        <label for="is_rep">is_rep</label>
                        <input type="text"  class="form-control" value="0" id="is_rep" name="is_rep"   required  readonly>

                      </div>

                    </div>

                    <div class="row">

                        <div class="col">
                          <label for="type_exp_dest_id">type_exp_dest</label>
                          <select class="form-select form-select-sm" name="type_exp_dest_id" id="type_exp_dest_id" aria-label=".form-select-sm example" required>
                            <option disabled selected>type_exp_dest</option>
                            <option value="1">One</option>
                          </select>
                        </div>

                        <div class="col">
                            <label for="destination_arrive_id">destination_arrive</label>
                            <select class="form-select form-select-sm" name="destination_arrive_id" id="destination_arrive_id" aria-label=".form-select-sm example" required>
                              <option disabled selected>destination_arrive</option>
                              <option value="1">One</option>
                            </select>
                          </div>

                        <div class="col">
                            <label for="mode_courrier_id">mode_courrier</label>
                            <select class="form-select form-select-sm" name="mode_courrier_id" id="mode_courrier_id" aria-label=".form-select-sm example" required>
                              <option disabled selected>mode_courrier</option>
                              <option value="1">One</option>
                            </select>
                          </div>

                      </div>

                      <div class="row">

                        <div class="col">
                          <label for="	type_courrier_id ">	type_courrier</label>
                          <select class="form-select form-select-sm" name="type_courrier_id " id="	type_courrier_id " aria-label=".form-select-sm example" required>
                            <option disabled selected>	type_courrier</option>
                            <option value="1">One</option>
                          </select>
                        </div>

                        <div class="col">
                            <label for="nature_courrier_id">nature_courrier</label>
                            <select class="form-select form-select-sm" name="nature_courrier_id" id="nature_courrier_id" aria-label=".form-select-sm example" required>
                              <option disabled selected>nature_courrier</option>
                              <option value="1">One</option>
                            </select>
                          </div>

                        <div class="col">
                            <label for=" ">pdf</label>
                            <input type="file"  class="form-control" id="" name=""   required >
                          </div>

                      </div>

                      <div class="row">

                        {{-- <div class="col">
                          <label for="pays_id">	pays</label>
                          <select class="form-select form-select-sm" name="pays_id" id="pays_id" aria-label=".form-select-sm example" required>
                            <option disabled selected>	pays</option>
                            <option value="1">One</option>
                          </select>
                        </div> --}}

                        {{-- <div class="col">
                            <label for="etudiant">etudiant</label>
                            <select class="form-select form-select-sm" name="etudiant" id="etudiant" aria-label=".form-select-sm example" required>
                              <option disabled selected>etudiant</option>
                              <option value="1">One</option>
                            </select>
                          </div> --}}



                      </div>

                      <div class="row">

                        <div class="col">

                          <label for="date_rep">date_rep</label>
                        <input type="datetime-local"  class="form-control" id="date_rep" name="date_rep" min="{{ date('Y-m-d\TH:i', strtotime('+1 hour')) }}" required >
                        </div>

                        <div class="col">
                            <label for="etat_courrier_id">etat_courrier</label>
                            <select class="form-select form-select-sm" name="etat_courrier_id" id="etat_courrier_id" aria-label=".form-select-sm example" required>
                              <option disabled selected>etat_courrier</option>
                              <option value="1">One</option>
                            </select>
                          </div>

                        <div class="col">
                            <label for="is_lu">is_lu</label>
                            <input type="text"  class="form-control" value="0" id="is_lu" name="is_lu"   required  readonly>

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
