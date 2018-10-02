@extends('layouts.app-mine')

@section('title', 'Login formulier')

@section('bodyClass', 'admin admin-home')

@section ('page', 'home')

@section('content')

    <h1>Evenementen</h1>
    <ul class="list-group">
        @foreach($events as $event)
            <li class="list-group-item dropdown">

                <div class="dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ $event->name }}
                </div>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a href="{{ URL::asset('admin/evenementen/'.$event->id.'/standhouders') }}" class="dropdown-item">Standhouders</a>
                    <a href="{{ URL::asset('admin/evenementen/'.$event->id.'/wijzigen') }}" class="dropdown-item">Wijzigen</a>
                    <a href="{{ URL::asset('admin/evenementen/'.$event->id.'/plattegrond') }}" class="dropdown-item">Plattegrond</a>
                    <div class="dropdown-divider"></div>

                    <form id="frm-delete" action="{{ URL::asset('admin/evenementen/'.$event->id) }}" method="POST">
                        {{ csrf_field() }}
                        @method('DELETE')

                        <button type="submit" class="dropdown-item">
                            Verwijderen
                        </button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

@endsection