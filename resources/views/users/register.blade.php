@extends('layouts.app')

@section('content')
<div class="d-flex flex-column ms-5  my-3 align-items-center justify-content-between">
    <div>
    <svg width="82px" height="82px" viewBox="-1.92 -1.92 27.84 27.84" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 7.00005L10.2 11.65C11.2667 12.45 12.7333 12.45 13.8 11.65L20 7" stroke="#000000" stroke-width="0.264" stroke-linecap="round" stroke-linejoin="round"></path> <rect x="3" y="5" width="18" height="14" rx="2" stroke="#000000" stroke-width="0.264" stroke-linecap="round"></rect> </g></svg>

    </div>
    <div>
    <h3 class="text-decoration-underline text-dark">Création du compte</h3>

    </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

<form method="POST" action="/register">
    @csrf

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-8">
            <input type="text" class="form-control" id="name" name="name"  value="{{old('name')}}">
            @error('name') 
                <p class="text-danger m-0">{{$message}}</p>
            @enderror
        </div>
    </div>

    <div class="form-group row my-4">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

        <div class="col-md-8">
            <input type="email" class="form-control" id="email" name="email"  value="{{old('email')}}">
            @error('email') 
                <p class="text-danger m-0">{{$message}}</p>
            @enderror
        </div>
    </div>

      <div class="form-group row my-4">

        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-8">
            <input type="password" class="form-control" id="password" name="password"  >
            @error('password') 
                <p class="text-danger m-0">{{$message}}</p>
            @enderror
        </div>
    </div>


    <div class="form-group row my-4">

        <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

        <div class="col-md-8">
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"  autofocus>
            @error('password_confirmation') 
                <p class="text-danger m-0">{{$message}}</p>
            @enderror
        </div>
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-white border border-dark ">Register</button>

    </div>
</form>

<hr class="my-4">

@endsection
