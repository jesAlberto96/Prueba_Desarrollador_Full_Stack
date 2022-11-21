@extends('layouts.auth')

@section('content')
<div class="row content-welcome">
    <div class="col-8 content-welcome__background" style="background-image: url({{ asset('img/app/background-image.png') }})">
        <h1>
            Bienvenido a la mejor plataforma <br>
           <b>organizacional online</b> 
        </h1>
        <h3>
            Gestión efectiva del talento humano
        </h3>
    </div>
    <div class="col-4 content-welcome__login">
        <div class="row content-form">
            <div class="col-12 form">
                <img src="{{ asset('img/app/logo.png') }}" alt="">

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="col-12">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row mb-3 check-remember">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 button">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                    </div>

                    <div class="row mb-0">
                        <div class="col-12 button">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<link href="{{ asset('css/login/styles.css') }}" rel="stylesheet" type="text/css" />
@endsection
