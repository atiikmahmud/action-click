<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="{{ env('APP_NAME') }}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">

    <title>@yield('title') - {{ env('APP_NAME') }}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-style.css') }}">

    @stack('styles')
</head>

<body>
    @include('layouts.partials.page-loader')

    @include('layouts.partials.nav')

    @yield('content')

    @include('layouts.partials.footer')

    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>

    @stack('scripts')
</body>

</html>