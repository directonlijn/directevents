@extends('layouts.app-mine')

@section('title', 'Event aanmaken')

@section('bodyClass', 'admin admin-create-event')

@section ('page', 'evenementen')

@section('content')
    <form class="form-signin" action="/evenement" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Naam</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Naam van evenement" value="{{ $event->name }}">
        </div>
        <div class="form-group">
            <label for="days">Dagen</label>
            <input class="date form-control datepicker"  type="text" id="datepicker" name="days" value="{{ $event->days }}">
        </div>
        <div class="form-group">
            <label for="price_ground">Prijs grondplek per m1</label>
            <input type="text" class="form-control" name="price_ground" id="price_ground" placeholder="Prijs grondplek" value="{{ $event->price_ground }}">
        </div>
        <div class="form-group">
            <label for="price_ground_all_days">Prijs grondplek per m1(alle dagen p.d.)</label>
            <input type="text" class="form-control" name="price_ground_all_days" id="price_ground_all_days" placeholder="Prijs gronplek" aria-describedby="price_ground_all_days_help" value="{{ $event->price_ground_all_days }}">
            <small id="price_ground_all_days_help" class="form-text text-muted">Bij meerdere dagen kan je zo een gereduceerd tarief rekenen per m1</small>
        </div>
        <div class="form-group">
            <label for="price_stand">Prijs per kraam</label>
            <input type="text" class="form-control" name="price_stand" id="price_stand" placeholder="Prijs grondplek" value="{{ $event->price_stand }}">
        </div>
        <div class="form-group">
            <label for="price_stand_all_days">Prijs per kraam(alle dagen p.d.)</label>
            <input type="text" class="form-control" name="price_stand_all_days" id="price_stand_all_days" placeholder="Prijs kraam" aria-describedby="price_stand_all_days_help" value="{{ $event->price_stand_all_days }}">
            <small id="price_stand_all_days_help" class="form-text text-muted">Bij meerdere dagen kan je zo een gereduceerd tarief rekenen per kraam</small>
        </div>
        <div class="form-group">
            <label for="domain">Website url:</label>
            <select class="form-control" id="domain">
                @foreach($domains as $domain)
                    <option value="{{ $domain->id }}">http://{{ $domain->domein }}.nl</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="address">Straat</label>
            <input type="text" class="form-control" name="address" id="address" placeholder="Vul hier de straatnaam in" value="{{ $event->address }}">
        </div>
        <div class="form-group">
            <label for="street_number">Huisnummer</label>
            <input type="text" class="form-control" name="street_number" id="street_number" placeholder="Vul hier het huisnummer in" value="{{ $event->street_number }}">
        </div>
        <div class="form-group">
            <label for="addition">Toevoeging</label>
            <input type="text" class="form-control" name="addition" id="addition" placeholder="Vul hier de eventuele toevoeging in" value="{{ $event->addition }}">
        </div>
        <div class="form-group">
            <label for="zipcode">Postcode</label>
            <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="Vul hier de postcode in" value="{{ $event->zipcode }}">
        </div>
        <div class="form-group">
            <label for="city">Plaatsnaaam</label>
            <input type="text" class="form-control" name="city" id="city" placeholder="Vul hier de plaatsnaam in" value="{{ $event->city }}">
        </div>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>

@endsection