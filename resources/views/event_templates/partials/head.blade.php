<meta charset="utf-8">
<title>Direct Events - @yield('title')</title>
<meta name="description" content="Home">
<meta name="robots" content="noindex,no-follow">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="dns-prefetch" href="//maxcdn.bootstrapcdn.com"/>
<link rel="dns-prefetch" href="//code.jquery.com"/>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
{{--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">--}}
<link href="{{ URL::asset('templates/style/'.$domainDetails['template'].'.css') }}" rel="stylesheet" type="text/css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">