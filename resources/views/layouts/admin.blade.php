<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style layout-menu-fixed layout-compact"
    dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('admin-assets/') }}"
    data-template="vertical-menu-template-free" data-style="light">

<head>
    @include('layouts.admin-partials.header')
</head>

<body>
    <div id="loader" style="display: none;">
        <img src="{{ asset('admin-assets/img/loader/approved.gif') }}" alt="Loading...">
    </div>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- Menu -->
            @include('layouts.admin-partials.menu')
            <!-- End Menu -->

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Navbar -->
                @include('layouts.admin-partials.nav')
                <!-- End Navbar -->
                <div class="content-wrapper">
                    <!-- Main Content wrapper -->
                    @yield('content')
                    <!-- End Main Content wrapper -->
                    @include('layouts.admin-partials.main-footer')
                    <!-- End Main Footer -->

                    <div class="content-backdrop fade"></div>
                </div>

            </div>
            <!-- End Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- End Layout wrapper -->

    <!-- Footer -->
    @include('layouts.admin-partials.footer')

</body>

</html>
