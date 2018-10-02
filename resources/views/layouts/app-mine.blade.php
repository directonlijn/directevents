<html>
    <head>
        @include ('partials.head')
    </head>
    <body class="jumbotron @yield('bodyClass')">
        <div id="app">
            @include ('partials.navbar')

            @yield('content')
        </div>

        @include ('partials.scripts')
    </body>
</html>