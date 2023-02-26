@extends('layouts.app')

@section('content')

<<<<<<< HEAD

<div class="d-flex flex-column ms-5  my-3 align-items-center justify-content-between">
<div>
<svg width="82px" height="82px" viewBox="-1.92 -1.92 27.84 27.84" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 7.00005L10.2 11.65C11.2667 12.45 12.7333 12.45 13.8 11.65L20 7" stroke="#000000" stroke-width="0.264" stroke-linecap="round" stroke-linejoin="round"></path> <rect x="3" y="5" width="18" height="14" rx="2" stroke="#000000" stroke-width="0.264" stroke-linecap="round"></rect> </g></svg>

</div>
<div>
<h3 class="text-decoration-underline text-dark">Sign in</h3>

</div>
</div>

=======
              <h3 class="mb-5">Sign in</h3>
              @error('error')
                <div class="alert alert-danger">
                            <span>{{ $message }}</span>

                </div>
              @enderror
>>>>>>> 65153bb2846e467410bbbad6a406df96aa67eb8f
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row my-4">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-8">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="text-end">
                    <button class="btn btn-white border border-dark   btn-block" type="submit">Login</button>
                </div>
              </form>
              <hr class="my-4">
@endsection
