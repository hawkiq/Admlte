<link rel="icon" type="image/png" href="{{ asset('assets/favicon/favicon-96x96.png') }}" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="{{ asset('assets/favicon/favicon.svg') }}" />
<link rel="shortcut icon" href="{{ asset('assets/favicon/favicon.ico') }}" />
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-touch-icon.png') }}" />
<meta name="apple-mobile-web-app-title" content="@yield('title_prefix', config('admlte.title_prefix', '')) @yield('title', config('admlte.title', 'AdminLTE 4')) " />
<link rel="manifest" href="{{ asset('assets/favicon/site.webmanifest') }}" />
<link rel="mask-icon" href="{{ asset('assets/img/favic/safari-pinned-tab.svg') }}"
    color="{{ config('admlte.full_mask_icon') }}">
<meta name="msapplication-TileColor" content="{{ config('admlte.full_tile_color') }}">
<meta name="theme-color" content="{{ config('admlte.full_theme_color') }}">
