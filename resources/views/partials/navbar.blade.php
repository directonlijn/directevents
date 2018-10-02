<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#"><img src="{{ URL::asset('images/logo.png') }}"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item @if(section_has_value('page', 'home')) active @endif">
                <a class="nav-link" href="{{ URL::asset('/') }}">Home @if(section_has_value('page', 'home')) <span class="sr-only">(current)</span> @endif</a>
            </li>
            @if (!\Auth::user())
                <li class="nav-item @if(section_has_value('page', 'login')) active @endif">
                    <a class="nav-link" href="{{ URL::asset('/login') }}">Login @if(section_has_value('page', 'login')) <span class="sr-only">(current)</span> @endif</a>
                </li>
            @endif
            @if (\Auth::user() && \Auth::user()->hasRole('administrator'))
                <div class="dropdown-divider"></div>
                <li class="nav-item @if(section_has_value('page', 'admin')) active @endif">
                    <a class="nav-link" href="{{ URL::asset('/admin') }}">Admin @if(section_has_value('page', 'admin')) <span class="sr-only">(current)</span> @endif</a>
                </li>
                <li class="nav-item @if(section_has_value('page', 'evenementen')) active @endif">
                    <a class="nav-link" href="{{ URL::asset('/admin/evenementen') }}">Evenementen @if(section_has_value('page', 'evenementen')) <span class="sr-only">(current)</span> @endif</a>
                </li>
                <li class="nav-item @if(section_has_value('page', 'standhouders')) active @endif">
                    <a class="nav-link" href="{{ URL::asset('/admin/standhouders') }}">Standhouders @if(section_has_value('page', 'standhouders')) <span class="sr-only">(current)</span> @endif</a>
                </li>
                <li class="nav-item @if(section_has_value('page', 'facturen')) active @endif">
                    <a class="nav-link" href="{{ URL::asset('/admin/facturen') }}">Facturen @if(section_has_value('page', 'facturen')) <span class="sr-only">(current)</span> @endif</a>
                </li>
            @endif
            @if (\Auth::user() && \Auth::user()->hasRole('standhouder') || \Auth::user() && \Auth::user()->hasRole('administrator'))
                <div class="dropdown-divider"></div>
                <li class="nav-item @if(section_has_value('page', 'dashboard')) active @endif">
                    <a class="nav-link" href="{{ URL::asset('/dashboard') }}">Dashboard @if(section_has_value('page', 'dashboard')) <span class="sr-only">(current)</span> @endif</a>
                </li>
            @endif
            @if (\Auth::user())
                <div class="dropdown-divider"></div>
                <li class="nav-item @if(section_has_value('page', 'logout')) active @endif">
                    <a class="nav-link" href="{{ URL::asset('/logout') }}">Uitloggen @if(section_has_value('page', 'logout')) <span class="sr-only">(current)</span> @endif</a>
                </li>
            @endif
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link disabled" href="#">Disabled</a>--}}
            {{--</li>--}}
            {{--<li class="nav-item dropdown">--}}
                {{--<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>--}}
                {{--<div class="dropdown-menu" aria-labelledby="dropdown01">--}}
                    {{--<a class="dropdown-item" href="#">Action</a>--}}
                    {{--<a class="dropdown-item" href="#">Another action</a>--}}
                    {{--<a class="dropdown-item" href="#">Something else here</a>--}}
                {{--</div>--}}
            {{--</li>--}}
        </ul>
        {{--<form class="form-inline my-2 my-lg-0">--}}
            {{--<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">--}}
            {{--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
        {{--</form>--}}
    </div>
</nav>