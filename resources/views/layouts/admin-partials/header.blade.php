<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title') - {{ env('APP_NAME') }}</title>

<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="{{ asset('admin-assets/img/favicon/favicon.ico') }}" />

<!-- Helpers -->
<script src="{{ asset('admin-assets/vendor/js/helpers.js') }}"></script>
<script src="{{ asset('admin-assets/js/config.js') }}"></script>

@stack('headScripts')

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/fonts/remixicon/remixicon.css') }}" />

<!-- Menu waves for no-customizer fix -->
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/node-waves/node-waves.css') }}" />

<!-- Core CSS -->
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/css/theme-default.css') }}"
    class="template-customizer-theme-css" />
<link rel="stylesheet" href="{{ asset('admin-assets/css/demo.css') }}" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
<link rel="stylesheet" href="{{ asset('admin-assets/vendor/libs/apex-charts/apex-charts.css') }}" />

@stack('headstyles')

<!-- Styles -->
<link href="{{ asset('admin-assets/css/style.css') }}" rel="stylesheet">
