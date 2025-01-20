<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    dir="{{ in_array(app()->getLocale(), ['ar', 'he']) ? 'rtl' : 'ltr' }}">
<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
        @yield('title_prefix', config('admlte.title_prefix', ''))
        @yield('title', config('admlte.title', 'AdminLTE 4'))
    </title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="title" content="@yield('title_prefix', config('admlte.title_prefix', '')) @yield('title', config('admlte.title', 'AdminLTE 4')) " />
    <meta name="author" content="hawkiq" />
    <meta name="description" content="@yield('description', 'adminlte hawkiq')" />
    <meta name="keywords" content="@yield('keywords', 'adminlte hawkiq')" />
    <!--end::Primary Meta Tags-->
    <!--begin::Fonts-->
    @if (config('admlte.google_fonts', true))
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
            rel="stylesheet">
        <style>
            * {
                font-family: "Roboto", serif;
            }
        </style>
    @endif
    <!--end::Fonts-->
    @include('admlte::partials.styles')

    @if (config('admlte.use_ico'))
        <link rel="shortcut icon" href="{{ asset('assets/favicon/favicon.ico') }}" />
    @elseif(config('admlte.use_full'))
        @include('admlte::partials.favicons')
    @endif

    <!-- Extra Configured Plugins Stylesheets -->
    @include('admlte::plugins', ['type' => 'css'])


    @if (config('admlte.livewire'))
        <!-- Livewire Styles -->
        @livewireStyles
    @endif


    <!-- Custom Stylesheets (post AdminLTE)-->
    @yield('css')
    @stack('css')
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="sidebar-expand-lg sidebar-mini bg-body-tertiary">

    @yield('body')

    @include('admlte::partials.scripts')


    @if (config('admlte.livewire'))
        <!-- Livewire Script  -->
        @livewireScripts
        <!--end::Script-->
    @endif
    <!-- Extra Configured Plugins Scripts -->
    @include('admlte::plugins', ['type' => 'js'])
    @yield('js')
    @stack('js')
</body>
<!--end::Body-->

</html>
