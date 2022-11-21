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

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-text">
                        <h3>{{ __('Register') }}</h3>
                    </div>

                    <div class="col-12">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="col-12 button">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>

                    <div class="row mb-0">
                        <div class="col-12 back">
                            <a class="nav-link" href="{{ route('login') }}">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<link href="{{ asset('css/register/styles.css') }}" rel="stylesheet" type="text/css" />
@endsection
