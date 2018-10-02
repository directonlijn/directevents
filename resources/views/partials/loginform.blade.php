@extends('layouts.app')

@section('title', 'Login formulier')

@section('content')

    <form class="form-signin" action="/login" method="POST">
        @csrf
        <img class="mt-2 mb-2" src="{{ URL::asset('images/logo.png') }}" alt="">
        <h1 class="h3 mb-3 font-weight-normal">Login</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email adres" required="" autofocus="" autocomplete="off">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Wachtwoord" required="" autocomplete="off">
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Onthoud mij
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Inloggen</button>
        <p class="mt-5 mb-3 text-center text-muted">© 2017-2018</p>
    </form>

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