@extends('layouts.app-mine')

@section('title', 'Login formulier')

@section('bodyClass', 'admin admin-home')

@section ('page', 'admin')

@section('content')

    Welkom administrator ({{ Auth::user()->firstname }} {{ Auth::user()->lastname }})

@endsection