@extends('layouts.app-mine')

@section('title', 'Login formulier')

@section('bodyClass', 'admin admin-events-index')

@section ('page', 'home')

@section('content')

    <div class="row">
        <div class="col-6">
            <a href="{{ URL::asset('admin/evenementen/all') }}" class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Alle</h5>
                </div>
            </a>
        </div>
        <div class="col-6">
            <a href="{{ URL::asset('admin/evenementen/aanmaken') }}" class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Aanmaken</h5>
                </div>
            </a>
        </div>
    </div>

@endsection