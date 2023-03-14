<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="grid place-items-center">

<div class="border-gray-500 rounded w-3/5 h-4/5 grid place-items-center"> 
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-base font-semibold leading-6 text-gray-900">Profile de {{$user->name }} {{$user->prenom}}</h3>
        <p class="mt-1 text-sm text-gray-600">This information will be displayed publicly so be careful what you share.</p>
      </div>
    </div>
    <div class="mt-5 md:col-span-2 md:mt-0 ">
      <form  method="POST" action='/update/{{$user->id}}' enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="shadow sm:overflow-hidden sm:rounded-md ">
          <div class="space-y-6 bg-white px-4 py-5 sm:p-6 ">
        
            <div>
                <label for="login" class="block text-sm font-medium leading-6 text-gray-900">login</label>
                    <input class="block w-full flex-1 rounded-none rounded-r-md border-0 py-1.5 px-1 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="text" name="login" value="{{$user->login}}" required autofocus autocomplete="off">

                    @error('login')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="nom" class="block text-sm font-medium leading-6 text-gray-900">nom</label>
                    <input class="block w-full flex-1 rounded-none rounded-r-md border-0 py-1.5 px-1 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="text" name="nom" value="{{$user->nom}}" required autofocus autocomplete="off">

                    @error('nom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="prenom" class="block text-sm font-medium leading-6 text-gray-900">prenom</label>
                    <input class="block w-full flex-1 rounded-none rounded-r-md border-0 py-1.5 px-1 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="text" name="prenom" value="{{$user->prenom}}" required autofocus autocomplete="off">

                    @error('prenom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">email</label>
                    <input class="block w-full flex-1 rounded-none rounded-r-md border-0 py-1.5 px-1 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="text" name="email" value="{{$user->email}}" required autofocus autocomplete="off">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

              <div class="flex flex-col mb-3">
                  <label for="">Départements</label>
                  <select class="form-control block w-full flex-1 rounded-none rounded-r-md border-0 py-1.5 px-1 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" id="profil" name="profil_id">
                      <option  value="">-- Choisir une département --</option>
                      
                      @foreach ($departement  as $dep )
                      <option {{($dep->id===$user->profil_id) ? 'selected' : ''}}  value="{{ $dep->id }}">{{ $dep->name }}</option>
                      @endforeach
                      </select>
                      @error('profil_id') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
              </div>
              <div class="flex flex-col mb-3">
                <label for="">Fonctions</label>
                <select class="form-control block w-full flex-1 rounded-none rounded-r-md border-0 py-1.5 px-1 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" id="profil" name="fonction_id">
                    <option  value="">-- Choisir une fonction --</option>
                    
                    @foreach ($fonctions  as $fct )
                        <option {{($fct->id===$user->fonction_id) ? 'selected' : ''}}  value="{{ $fct->id }}">{{ $fct->name }}</option>
                    @endforeach
                    </select>
                    @error('profil_id') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="new_password" class="form-control-label">New Password</label>
                    <input class="form-control @error('new_password') is-invalid @enderror block w-full flex-1 rounded-none rounded-r-md border-0 py-1.5 px-1 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="password" name="new_password" value=""  autocomplete="off">

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
                    <input class="form-control @error('confirm_password') is-invalid @enderror block w-full flex-1 rounded-none rounded-r-md border-0 py-1.5 px-1 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="password" name="confirm_password" value=""  autocomplete="off">
                    @error('confirm_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                </div>

            </div>


          </div>
          <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Appliquer les changements</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


</body>
</html>