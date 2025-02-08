<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    dir="{{ in_array(app()->getLocale(), config('admlte.rtl_languages')) ? 'rtl' : 'ltr' }}">
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
        @php
            $locale = app()->getLocale();
            $rtlLanguages = config('admlte.rtl_languages', []);
            $isRtl = in_array($locale, $rtlLanguages);
            $fontUrl = config('admlte.google_fonts_' . ($isRtl ? 'arabic' : 'english'));
            $fontFamily = config('admlte.font_family_' . ($isRtl ? 'arabic' : 'english'));
        @endphp

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="{!! $fontUrl !!}" rel="stylesheet">

        <style>
            * {
                font-family: "{{ $fontFamily }}", sans-serif;
            }
        </style>
    @endif
    <!--end::Fonts-->

    @if (config('admlte.use_ico'))
        <link rel="shortcut icon" href="{{ asset('vendor/admlte/favicon/favicon.ico') }}" />
    @elseif(config('admlte.use_full'))
        @include('admlte::partials.favicons')
    @endif

    @if (config('admlte.vite'))
        @vite(config('admlte.vite_css'))
        @if (config('admlte.filament'))
            <!-- Filament Styles -->
            @filamentStyles
        @endif
    @else
        @include('admlte::partials.styles')
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
@php
    $classes = [
        'layout-fixed' => config('admlte.layout_fixed'),
        'fixed-header' => config('admlte.fixed_header'),
        'fixed-footer' => config('admlte.fixed_footer'),
        'sidebar-collapse' => config('admlte.sidebar_minimized'),
        'login-page bg-secondary' => isset($auth_type) && $auth_type == 'login',
        'sidebar-expand-lg sidebar-mini' => !(isset($auth_type) && $auth_type == 'login'),
    ];

    $classList = array_filter($classes, fn($value) => $value);
@endphp

<body class="{{ implode(' ', array_keys($classList)) }} bg-body-tertiary">

    @yield('body')

    @if (config('admlte.vite'))
        @vite(config('admlte.vite_js'))
        @if (config('admlte.filament'))
            <!-- Filament Scripts -->
            @filamentScripts
        @endif
    @else
        @include('admlte::partials.scripts')
    @endif


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
