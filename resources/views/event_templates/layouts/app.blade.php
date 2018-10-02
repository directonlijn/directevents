<html>
<head>
    @include ('event_templates.partials.head')
</head>
<body class="jumbotron @yield('bodyClass')">
<div id="app">
    @include ('event_templates.partials.navbar')

    @yield('content')
</div>

@yield ('top-scripts')
@include ('event_templates.partials.scripts')
</body>
</html>