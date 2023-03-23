@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')

@include('layouts.navbars.auth.topnav', ['title' => 'Courrier Depart'])

<div class="row mt-4 mx-4">
    <div class="col-12">

        <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6>Courrier Depart</h6>


                {{-- @if(Auth::user()->is_admin==1) --}}
                <a type="button" data-bs-toggle="modal" data-bs-target="#ajouter_courrier_depart" title="ajouter_courrier_depart" href="#"> <i class="fa fa-plus"></i> </a>
                {{-- @endif --}}

            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table table-striped table-bordered  table-hover table-sm align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Number</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date Envoie</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Objet</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nature</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Destination</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PDF</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Action</th>

                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($courrier_depart as $courrier_dept )

                            @if($courrier_dept->is_lu == 0)

                            <tr class="text-center table-row cursor-pointer  bg-info" data-href="{{ route('courrier_dept.show', ['id' => $courrier_dept->id]) }}">
                             @else
                            <tr class="text-center table-row cursor-pointer"  data-href="{{ route('courrier_dept.show', ['id' => $courrier_dept->id]) }}">

                             @endif


                                <td>
                                    <p class="text-sm font-weight-bold mb-0">{{ $courrier_dept ->id }}</p>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">{{ $courrier_dept ->number }}</p>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">{{ $courrier_dept ->date_envoie }}</p>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">{{ $courrier_dept ->objet }}</p>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">{{ $courrier_dept ->type }}</p>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">{{ $courrier_dept ->nature }}</p>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">{{ $courrier_dept ->destination }}</p>
                                </td>
                                <td >
                                    <a href="{{ url('/download_pdf_depart',$courrier_dept ->pdf_file)}}" class="t font-weight-bold mb-0">
                                    <svg width="50px" height="50px" viewBox="-2.16 -2.16 28.32 28.32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#a3a3a3" stroke="#a3a3a3"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>pdf_fill</title> <g id="页面-1" stroke-width="0.00024000000000000003" fill="none" fill-rule="evenodd"> <g id="File" transform="translate(-480.000000, -144.000000)"> <g id="pdf_fill" transform="translate(480.000000, 144.000000)"> <path d="M24,0 L24,24 L0,24 L0,0 L24,0 Z M12.5934901,23.257841 L12.5819402,23.2595131 L12.5108777,23.2950439 L12.4918791,23.2987469 L12.4918791,23.2987469 L12.4767152,23.2950439 L12.4056548,23.2595131 C12.3958229,23.2563662 12.3870493,23.2590235 12.3821421,23.2649074 L12.3780323,23.275831 L12.360941,23.7031097 L12.3658947,23.7234994 L12.3769048,23.7357139 L12.4804777,23.8096931 L12.4953491,23.8136134 L12.4953491,23.8136134 L12.5071152,23.8096931 L12.6106902,23.7357139 L12.6232938,23.7196733 L12.6232938,23.7196733 L12.6266527,23.7031097 L12.609561,23.275831 C12.6075724,23.2657013 12.6010112,23.2592993 12.5934901,23.257841 L12.5934901,23.257841 Z M12.8583906,23.1452862 L12.8445485,23.1473072 L12.6598443,23.2396597 L12.6498822,23.2499052 L12.6498822,23.2499052 L12.6471943,23.2611114 L12.6650943,23.6906389 L12.6699349,23.7034178 L12.6699349,23.7034178 L12.678386,23.7104931 L12.8793402,23.8032389 C12.8914285,23.8068999 12.9022333,23.8029875 12.9078286,23.7952264 L12.9118235,23.7811639 L12.8776777,23.1665331 C12.8752882,23.1545897 12.8674102,23.1470016 12.8583906,23.1452862 L12.8583906,23.1452862 Z M12.1430473,23.1473072 C12.1332178,23.1423925 12.1221763,23.1452606 12.1156365,23.1525954 L12.1099173,23.1665331 L12.0757714,23.7811639 C12.0751323,23.7926639 12.0828099,23.8018602 12.0926481,23.8045676 L12.108256,23.8032389 L12.3092106,23.7104931 L12.3186497,23.7024347 L12.3186497,23.7024347 L12.3225043,23.6906389 L12.340401,23.2611114 L12.337245,23.2485176 L12.337245,23.2485176 L12.3277531,23.2396597 L12.1430473,23.1473072 Z" id="MingCute" fill-rule="nonzero"> </path> <path d="M12,2 L12,8.5 C12,9.32843 12.6716,10 13.5,10 L20,10 L20,20 C20,21.1046 19.1046,22 18,22 L6,22 C4.89543,22 4,21.1046 4,20 L4,4 C4,2.89543 4.89543,2 6,2 L12,2 Z M11.0113,11.8481 C10.7715,13.3709 9.975,14.7506 8.776,15.7196 C7.88908,16.4365 8.69984,17.8414 9.76438,17.4317 C11.2031,16.8779 12.7962,16.8779 14.235,17.4317 C15.2992,17.8413 16.1105,16.4367 15.2234,15.7197 C14.0245,14.7506 13.2279,13.3709 12.9881,11.848 C12.8108,10.722 11.1887,10.7207 11.0113,11.8481 Z M11.9986,14.3028 L12.805,15.6972 L11.195,15.6972 L11.9986,14.3028 Z M14,2.04336 C14.3759,2.12295 14.7241,2.30991 15,2.58579 L19.4142,7 C19.6901,7.27588 19.8771,7.62406 19.9566,8 L14,8 L14,2.04336 Z" id="形状" fill="#0456c8"> </path> </g> </g> </g> </g></svg>
                                    </a>
                                </td>

                                <td class="align-middle text-end">
                                    <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                        <a title="view" href="#" class="text-sm btn btn-success font-weight-bold mb-0 me-1 "><i class="far fa-eye " aria-hidden="true"></i></a>
                                        <a title="editer"  href="/modifier_courrier_depart/{{$courrier_dept->id}}" class="text-sm btn btn-warning font-weight-bold mb-0 me-1 "><i class="far fa-edit " aria-hidden="true"></i></a>
                                        <a  title="supprimer" href="/supprimer_courier_depart/{{$courrier_dept->id}}" class="text-sm btn btn-danger font-weight-bold mb-0 me-1"><i class="far fa-trash-alt " aria-hidden="true"></i></a>


                                    </div>
                                </td>

                            </tr>
                        @endforeach
                        @if(session('delete'))
                            <div class="d-flex justify-content-center">
                            <div class="alert alert-warning w-75 fs d-flex justify-content-between" role="alert">
                                    <small class="text-white fw-bold">{{ session('delete') }}</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                            @endif
                            @if(session('ajoute'))
                            <div class="d-flex justify-content-center">
                            <div class="alert alert-success w-75 fs d-flex justify-content-between" role="alert">
                                    <small class="text-white fw-bold">{{ session('ajoute') }}</small>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- MOdal add Courrier Depart --}}

<div class="modal fade" id="ajouter_courrier_depart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="text-center text-decoration-underline mt-2 fw-bold">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter Courrier Depart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="my-form " role="form" method="POST" action="{{ route('ajouter.courrier-depart') }}" enctype="multipart/form-data">
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
                                <input type="datetime-local" class="form-control" id="date_envoie" name="date_envoie" min="{{ date('Y-m-d\TH:i', strtotime('+1 minute')) }}" required>
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
                                    <option disabled selected>type_exp_dest</option>
                                    @foreach ($expediteurs as $expediteur)
                                        <option value="{{$expediteur->id}}">{{$expediteur->name}}</option>
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
                                    <option disabled selected>Nature courrier</option>
                                    @foreach ($nature_courriers as $nature_courrier)
                                        <option value="{{$nature_courrier->id}}">{{$nature_courrier->name}}</option>
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
                                <textarea name="objet" class="form-control" id="objet" rows="3" required></textarea>
                                @error('objet') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror

                            </div>

                        </div>



                        {{-- Détail du courrier --}}
                        <div class="row flex align-items-center my-3">
                            <div class="col-4">
                                <label for="courrier_detail">Détail du courrier :</label>
                            </div>
                            <div class="col-8">
                                <textarea name="courrier_detail" class="form-control" id="courrier_detail" rows="3" required></textarea>
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
                                        <option value="{{$etat_courrier->id}}">{{$etat_courrier->name}}</option>
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
                                    <option disabled selected>mode_courrier</option>
                                    @foreach ($mode_courriers as $mode_courrier)
                                        <option value="{{$mode_courrier->id}}">{{$mode_courrier->name}}</option>
                                    @endforeach
                                </select>
                                @error('mode_courrier_id') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror

                            </div>

                        </div>
                            {{-- type de deaprt du courrier --}}
                            <div class="row flex align-items-center my-3">
                                <div class="col-4">
                                    <label for="type_courrier_id">type de départ :</label>
                                </div>
                                <div class="col-8">
                                    <select class="form-select form-select-sm" name="type_courrier_id" id="type_courrier_id" aria-label=".form-select-sm example" required>
                                        <option disabled selected>type_courrier</option>
                                        @foreach ($type_courriers as $type_courrier)
                                            <option value="{{$type_courrier->id}}">{{$type_courrier->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('type_courrier_id') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror

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
                                    @foreach ($dest_arrives as $dest_arrive)
                                        <option value="{{$dest_arrive->id}}">{{$dest_arrive->name}}</option>
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
<script>

    const tableRows = document.querySelectorAll('.table-row');
    tableRows.forEach(row => {
        row.addEventListener('click', () => {
            const url = row.dataset.href;
            window.location.href = url;
        });
    });
</script>
@endsection

