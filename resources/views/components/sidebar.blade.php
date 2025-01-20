<!--begin::Sidebar-->
<aside class="app-sidebar {{ config('admlte.classes_sidebar') }}" data-bs-theme="{{ config('admlte.data_bs_theme') }}">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a class='brand-link logo-switch' href='{{ route(config('admlte.dashboard_url')) }}'>
            <!--begin::Brand Image Small-->
            <img src="{{ asset(config('admlte.logo_img')) }}" alt="{{ config('admlte.logo_img_alt') }}"
                class="{{ config('admlte.logo_img_class', 'brand-image-xl') }} logo-xs opacity-75 shadow" />
            <!--end::Brand Image Small-->
            <!--begin::Brand Image Large-->
            <img src="{{ asset(config('admlte.logo_img_xl', 'vendor/admlte/images/logo.png')) }}"
                alt="{{ config('admlte.logo_img_alt') }}"
                class="{{ config('admlte.logo_img_xl_class', 'brand-image-xs') }} logo-xl opacity-75" />
            <!--end::Brand Image Large-->
            {{ config('admlte.logo') }}
        </a>
        <!--end::Brand Link-->
    </div>
    <!-- Sidebar -->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                @foreach (config('admlte.sidebar') as $item)
                    @if (empty($item['permission']))
                        @include('admlte::partials.sidebar-item', ['item' => $item])
                    @else
                        @if (config('admlte.permission_system') === 'laratrust')
                            @permission($item['permission'])
                                @include('admlte::partials.sidebar-item', ['item' => $item])
                            @endpermission
                        @else
                            @if (Gate::allows($item['permission']))
                                @include('admlte::partials.sidebar-item', ['item' => $item])
                            @endif
                        @endif
                    @endif
                @endforeach
            </ul>

            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->
