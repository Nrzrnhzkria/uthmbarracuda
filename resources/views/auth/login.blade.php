@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-5">

        <div class="col-md-6 text-center">
            <form class="form-signin" method="POST" action="{{ route('login') }}">
                @csrf
                <img class="mb-4" src="{{ asset('frontend/assets/logo.png') }}" alt="" width="100">

                <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email Address') }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <i class="glyphicon glyphicon-user form-control-feedback"></i>

                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" name="password" required autocomplete="current-password">
                
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                    </label>
                </div>

                <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('Login') }}</button>
                {{-- <br>
                @if (Route::has('password.request'))
                    <a class="text-decoration-none" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif --}}
                <p class="mt-5 mb-3 text-muted">Zarina Zakaria &copy; 2023. All Rights Reserved.</p>
            </form>
        </div>
        
        {{-- <div class="col-md-6">
            <div class="card border-0 rounded-0">

                <div class="card-body text-danger">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
