@extends('layouts.app-mine')

@section('title', 'Event aanmaken')

@section('bodyClass', 'admin admin-create-event')

@section ('page', 'evenementen')

@section('content')
    @include ('partials.form-error')

    <form class="form-signin" action="/admin/evenementen" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Naam</label>
            <input type="text" class="form-control {{ formField($errors, 'name') }}" value="{{ old('') }}" name="name" id="name" placeholder="Naam van evenement">
        </div>
        <div class="form-group">
            <label for="days">Dagen</label>
            <input class="date form-control datepicker {{ formField($errors, 'days') }}" value="{{ old('') }}"  type="text" id="datepicker" name="days">
        </div>
        <div class="form-group">
            <label for="price_ground">Prijs grondplek per m1</label>
            <input type="text" class="form-control {{ formField($errors, 'price_ground') }}" value="{{ old('') }}" name="price_ground" id="price_ground" placeholder="Prijs grondplek">
        </div>
        <div class="form-group">
            <label for="price_ground_all_days">Prijs grondplek per m1</label>
            <input type="text" class="form-control {{ formField($errors, 'price_ground_all_days') }}" value="{{ old('') }}" name="price_ground_all_days" id="price_ground_all_days" placeholder="Prijs gronplek" aria-describedby="price_ground_all_days_help">
            <small id="price_ground_all_days_help" class="form-text text-muted">Bij meerdere dagen kan je zo een gereduceerd tarief rekenen per m1</small>
        </div>
        <div class="form-group">
            <label for="price_stand">Prijs grondplek per m1</label>
            <input type="text" class="form-control {{ formField($errors, 'price_stand') }}" value="{{ old('') }}" name="price_stand" id="price_stand" placeholder="Prijs grondplek">
        </div>
        <div class="form-group">
            <label for="price_stand_all_days">Prijs per kraam</label>
            <input type="text" class="form-control {{ formField($errors, 'price_stand_all_days') }}" value="{{ old('') }}" name="price_stand_all_days" id="price_stand_all_days" placeholder="Prijs kraam" aria-describedby="price_stand_all_days_help">
            <small id="price_stand_all_days_help" class="form-text text-muted">Bij meerdere dagen kan je zo een gereduceerd tarief rekenen per kraam</small>
        </div>
        <div class="form-group {{ formField($errors, 'domain') }}">
            <label for="domain">Website url:</label>
            <select class="form-control" name="domain" id="domain">
                @foreach($domains as $domain)
                    <option value="{{ $domain->id }}">http://{{ $domain->domein }}.nl</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="address">Straat</label>
            <input type="text" class="form-control {{ formField($errors, 'address') }}" value="{{ old('') }}" name="address" id="address" placeholder="Vul hier de straatnaam in">
        </div>
        <div class="form-group">
            <label for="street_number">Huisnummer</label>
            <input type="text" class="form-control {{ formField($errors, 'street_number') }}" value="{{ old('') }}" name="street_number" id="street_number" placeholder="Vul hier het huisnummer in">
        </div>
        <div class="form-group">
            <label for="addition">Toevoeging</label>
            <input type="text" class="form-control {{ formField($errors, 'addition') }}" value="{{ old('') }}" name="addition" id="addition" placeholder="Vul hier de eventuele toevoeging in">
        </div>
        <div class="form-group">
            <label for="zipcode">Postcode</label>
            <input type="text" class="form-control {{ formField($errors, 'zipcode') }}" value="{{ old('') }}" name="zipcode" id="zipcode" placeholder="Vul hier de postcode in">
        </div>
        <div class="form-group">
            <label for="city">Plaatsnaaam</label>
            <input type="text" class="form-control {{ formField($errors, 'city') }}" value="{{ old('') }}" name="city" id="city" placeholder="Vul hier de plaatsnaam in">
        </div>
        <input type="hidden" name="country" value="nederland">
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>

@endsection