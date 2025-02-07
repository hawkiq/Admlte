@php($logout_url = View::getSection('logout_url') ?? config('admlte.logout_url', 'logout'))
@php($logout_url = $logout_url ? route($logout_url) : '')
<!--begin::Header-->
<nav class="app-header navbar navbar-expand {{ config('admlte.classes_navbar') }}"
    data-bs-theme="{{ config('admlte.navbar_data_bs_theme') }}">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
            @if (count(config('admlte.navbar.items')) > 0)
                @foreach (config('admlte.navbar.items') as $navbarItem)
                    @if (!isset($navbarItem['location']))
                        @if (empty($navbarItem['permission']))
                            @include('admlte::partials.navbar-item', ['item' => $navbarItem])
                        @else
                            @if (config('admlte.permission_system') === 'laratrust')
                                @if (\Laratrust::hasPermission($navbarItem['permission']))
                                    @include('admlte::partials.sidebar-item', ['item' => $navbarItem])
                                @endif
                            @else
                                @if (Gate::allows($navbarItem['permission']))
                                    @include('admlte::partials.sidebar-item', ['item' => $navbarItem])
                                @endif
                            @endif
                        @endif
                    @endif
                @endforeach
            @endif
        </ul>
        <!--end::Start Navbar Links-->
        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">
            @if (count(config('admlte.navbar.items')) > 0)
                @foreach (config('admlte.navbar.items') as $navbarItem)
                    @if (isset($navbarItem['location']) && $navbarItem['location'] == 'right')
                        @if (empty($navbarItem['permission']))
                            @include('admlte::partials.navbar-item', ['item' => $navbarItem])
                        @else
                            @if (config('admlte.permission_system') === 'laratrust')
                                @if (\Laratrust::hasPermission($navbarItem['permission']))
                                    @include('admlte::partials.sidebar-item', ['item' => $navbarItem])
                                @endif
                            @else
                                @if (Gate::allows($navbarItem['permission']))
                                    @include('admlte::partials.sidebar-item', ['item' => $navbarItem])
                                @endif
                            @endif
                        @endif
                    @endif
                @endforeach
            @endif
            @if (config('admlte.navbar.language_selector_widget'))
                <!--begin::Language Selector -->
                <x-admlte-lang-selector />
                <!--end::Language Selector -->
            @endif
            @if (config('admlte.navbar.full_screen_widget'))
                <!--begin::Fullscreen Toggle-->
                <li class="nav-item">
                    <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                        <i data-lte-icon="maximize" class="fas fa-expand"></i>
                        <i data-lte-icon="minimize" class="fas fa-compress" style="display: none"></i>
                    </a>
                </li>
            @endif
            <!--end::Fullscreen Toggle-->
            @auth
                <!--begin::User Menu Dropdown-->
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                        @if (config('admlte.usermenu_header'))
                            <!--begin::User Image-->
                            <li class="user-header {{ config('admlte.usermenu_header_class', 'text-bg-primary') }}">
                                <p>
                                    {{ Auth::user()->name }}
                                    <small>Member since {{ Auth::user()->created_at }}</small>
                                </p>
                            </li>
                        @endif
                        <!--end::User Image-->
                        <!--begin::Menu Footer-->
                        <li class="user-footer">
                            <a class="float-right btn btn-default btn-flat" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-fw fa-power-off text-red"></i>
                                {{ admlte_translate('log_out') }}
                            </a>
                            <form id="logout-form" action="{{ $logout_url }}" method="POST" style="display: none;">
                                @if (config('admlte.logout_method'))
                                    {{ method_field(config('admlte.logout_method')) }}
                                @endif
                                {{ csrf_field() }}
                            </form>
                        </li>
                        <!--end::Menu Footer-->
                    </ul>
                </li>
                <!--end::User Menu Dropdown-->
            @endauth
        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>
<!--end::Header-->
