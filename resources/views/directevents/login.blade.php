@extends('layouts.app')

@section('title', 'Login formulier')

@section('bodyClass', 'login')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<form class="form-signin" action="/login" method="POST">--}}
        {{--@csrf--}}
        {{--<img class="mb-4" src="{{ URL::asset('images/logo.png') }}" alt="" style="max-width:100%;">--}}
        {{--<h1 class="h3 mb-3 font-weight-normal">Login</h1>--}}
        {{--<label for="inputEmail" class="sr-only">Email address</label>--}}
        {{--<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email adres" required="" autofocus="" autocomplete="off">--}}
        {{--<label for="inputPassword" class="sr-only">Password</label>--}}
        {{--<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Wachtwoord" required="" autocomplete="off">--}}
        {{--<div class="checkbox mb-3">--}}
            {{--<label>--}}
                {{--<input type="checkbox" value="remember-me"> Onthoud mij--}}
            {{--</label>--}}
        {{--</div>--}}
        {{--<button class="btn btn-lg btn-primary btn-block" type="submit">Inloggen</button>--}}
        {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
            {{--{{ __('Forgot Your Password?') }}--}}
        {{--</a>--}}
        {{--<p class="mt-5 mb-3 text-center text-muted">© 2017-2018</p>--}}
    {{--</form>--}}

    {{--@if ($errors->any())--}}
    {{--<div class="alert alert-danger">--}}
    {{--<ul>--}}
    {{--@foreach ($errors->all() as $error)--}}
    {{--<li>{{ $error }}</li>--}}
    {{--@endforeach--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--@endif--}}

    {{--<form action="/login" method="POST">--}}
    {{--@csrf--}}
    {{--email:<input type="email" name="email" value="{{ old('email') }}"><br>--}}
    {{--@if ($errors->has('email'))--}}
    {{--<div class="error">{{ $errors->first('email') }}</div>--}}
    {{--@endif--}}
    {{--<br>--}}
    {{--password:<input type="password" name="password"><br>--}}
    {{--@if ($errors->has('password'))--}}
    {{--<div class="error">{{ $errors->first('password') }}</div>--}}
    {{--@endif--}}
    {{--<br>--}}
    {{--<input type="submit" value="submit">--}}
    {{--</form>--}}
@endsection