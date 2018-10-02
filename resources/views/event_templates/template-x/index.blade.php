
@extends('event_templates.layouts.app')

@section('title', 'Login formulier')

@section('page', 'home')

@section('content')

    {{--<img src="{{ URL::asset('temp_images/header.png') }}">--}}

    @php
        //dd($domainDetails);
        //echo \Session::getId();
    @endphp


    <div class="container">
        {{-- Give the user a choice between visitor or standhouder --}}

        <section id="user-selection" data-section="user-selection" v-if="userType == '' && authenticated === false">
            <div class="row mt-3">
                <div class="col-6">
                    <button class="btn" v-on:click="setUserType('visitor', $event)">Bezoeker</button>
                </div>
                <div class="col-6">
                    <button class="btn" v-on:click="setUserType('standhouder', $event)">Standhouder</button>
                </div>
            </div>
        </section>

        {{-- Section visitor --}}
        <section data-section="user-type-visitor" v-if="userType == 'visitor'">
            <h1>Hippiemarkt Amsterdam XL</h1>

            <div>
                <p>
                    De hippiemarkt Amsterdam XL is op het osdorpplein. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ultrices urna ac odio tincidunt scelerisque. Mauris sodales eget nisi sit amet elementum. Phasellus ut urna interdum, cursus magna sit amet, pretium ex. Etiam sit amet vehicula ante. Donec porttitor velit a lorem tempus consequat. Integer in iaculis arcu. Integer euismod sapien nec diam ullamcorper aliquet. Nam eu velit leo. Fusce eleifend porta urna, id pretium nisi sagittis et. Donec quis condimentum elit. Fusce enim mauris, iaculis a vestibulum vitae, euismod eget nunc. Suspendisse porta nulla sit amet nulla pellentesque egestas. Quisque vel libero pellentesque, accumsan elit sit amet, consequat felis. Aliquam eleifend diam urna, a porta nulla suscipit id. Ut euismod varius arcu quis eleifend.
                </p>
                <p>
                    Praesent blandit mauris nisi, quis laoreet risus ornare eget. Ut sed maximus augue. In quis nisl varius, aliquam eros id, tempor turpis. Suspendisse magna libero, dictum ac enim sed, sagittis finibus orci. Sed sagittis orci at aliquet porta. Duis et vestibulum dolor. Etiam volutpat dignissim ante et ultrices. Nullam ligula odio, suscipit vitae malesuada eu, malesuada laoreet justo. Nulla auctor tortor leo, sit amet sagittis lorem tristique quis. Vestibulum quis sodales nunc, a semper metus. Fusce lobortis ante diam, eget sagittis ipsum lobortis in. Praesent neque lectus, sodales ut tellus quis, varius elementum sem. Donec eget libero pulvinar, finibus turpis tristique, tincidunt felis. Nam quis bibendum arcu. Duis ac nibh eget urna mollis fermentum sed quis urna.
                </p>
                <p>
                    Donec ac convallis odio, nec consectetur velit. Morbi lacinia pellentesque ligula, et facilisis velit fringilla non. Quisque velit lacus, maximus sed cursus quis, faucibus id nibh. Vestibulum vehicula fringilla ex. Aliquam vitae mattis risus, ac elementum orci. Sed pellentesque massa in lorem posuere, eu lacinia lorem placerat. Mauris pharetra ligula eu semper pretium. Sed venenatis ligula at malesuada mollis. Nulla pellentesque nunc nec arcu tristique, a placerat sapien consectetur.
                </p>
                <p>
                    Etiam ultrices lacinia convallis. Sed et augue fermentum, dictum eros porta, rhoncus est. Aenean purus felis, aliquam et tellus in, malesuada pharetra arcu. Praesent convallis, orci id sodales rutrum, lacus elit euismod justo, sit amet vestibulum dolor neque facilisis libero. Phasellus at molestie urna. Fusce ante est, ornare ac tempus in, egestas sed orci. In imperdiet, nunc a dictum aliquet, neque urna cursus ante, vel volutpat velit justo placerat velit. Fusce eget mollis dolor. Morbi in ornare libero, nec egestas est.
                </p>
                <p>
                    Nam libero tellus, sagittis quis venenatis in, maximus vel sapien. Integer a ornare quam. Aenean scelerisque orci a erat varius, eget facilisis libero dapibus. In hac habitasse platea dictumst. Aliquam aliquam nunc eros, nec sagittis diam interdum id. Donec eu condimentum mi. Morbi et elit at diam pretium mattis. Cras molestie sapien ac commodo rutrum. Morbi facilisis odio vel lacus faucibus, quis aliquam velit aliquam. Sed in blandit lorem, sit amet condimentum eros. Praesent id arcu vel leo viverra mattis. Pellentesque efficitur dui ut suscipit porttitor.
                </p>
            </div>

        </section>

        {{-- Section standhouder --}}
        <section data-section="user-type-standhouder" v-if="authenticated || userType == 'standhouder'">
            <div class="authenticated-user" v-if="authenticated">
                {{-- Aanmelden voor de markt --}}
                <form id="register-event">
                    <div class="row mt-3">
                        <div class="col-6">
                            <button class="btn" v-bind:class="nonFoodBtnActive" v-on:click="setFoodType('non-food', $event)">Non-food</button>
                        </div>
                        <div class="col-6">
                            <button class="btn" v-bind:class="foodBtnActive" v-on:click="setFoodType('food', $event)">Food</button>
                        </div>
                    </div>

                    <div class="row mt-2" v-if="registerEventData.foodType == 'food' || registerEventData.foodType == 'non-food'">
                        <div class="col-6">
                            Kramen:
                            <input type="number" v-model="registerEventData.stalls" name="stalls">
                        </div>
                        <div class="col-6">
                            Grondplekken:
                            <input type="number" v-model="registerEventData.groundSpots" name="groundspots">
                        </div>
                        <div class="col-12 mt-1">
                            <div v-if="registerEventErrors.stalls" class="alert alert-danger" role="alert">
                                @{{ registerEventErrors.stalls[0] }}
                            </div>
                            <div v-if="registerEventErrors.groundSpots" class="alert alert-danger" role="alert">
                                @{{ registerEventErrors.groundSpots[0] }}
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2" v-if="registerEventData.foodType == 'food'">
                        {{--
                            Stroom
                            veld voor type eten
                        --}}
                    </div>

                    <div class="row mt-2" v-if="registerEventData.foodType == 'non-food'">
                        @foreach ($sellTypes as $sellType)
                            <div class="col-6 mt-1">
                                <input type="checkbox" v-model="registerEventData.sellTypes" name="sellTypes[]" value="{{$sellType->id}}">{{ $sellType->name }}
                            </div>
                        @endforeach
                        <div v-if="registerEventErrors.sellTypes" class="col-12">
                            <div class="alert alert-danger" role="alert">
                                @{{ registerEventErrors.sellTypes[0] }}
                            </div>
                        </div>
                        {{--
                            Type verkoopwaren
                            veld indien anders
                        --}}
                    </div>

                    <div class="row mt-2" v-if="registerEventData.foodType == 'food' || registerEventData.foodType == 'non-food'">
                        <div v-if="registerEventErrors.error" class="col-12 mb-1">
                            <div class="alert alert-danger" role="alert">
                                @{{ registerEventErrors.error }}
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-lg btn-primary btn-block" v-on:click="registerEvent">Aanmelden</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="login-user" v-if="authenticated === false">
                {{-- login/register/forgot --}}
                inloggen/registreren/vergeten

                <form class="form-signin" action="/login" method="POST">
                    <h1 class="h3 mb-3 font-weight-normal">Login</h1>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" id="inputEmail" class="form-control" v-model="loginFormData.email" placeholder="Email adres" required="" autofocus="" autocomplete="off">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" class="form-control" v-model="loginFormData.password" placeholder="Wachtwoord" required="" autocomplete="off">
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Onthoud mij
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" v-on:click="login">Inloggen</button>
                    <p class="mt-5 mb-3 text-center text-muted">© 2017-2018</p>
                </form>
            </div>
        </section>
    </div>
@endsection

@section('top-scripts')
    <script>
        window.auth_user = {!! json_encode($authenticated) !!};
        window.userType = '{!! $userType !!}';
        window.eventId = {{ $domainDetails['event_id'] }};
        window.sessionId = '{{ \Session::getId() }}';
    </script>
@endsection