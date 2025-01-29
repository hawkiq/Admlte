<!--begin::App Main-->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        @hasSection('header')
            @include('admlte::partials.header')
        @endif
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-12">

                    @if (config('admlte.use_card.enabled'))
                        <x-admlte-card
                            title="{{ !config('admlte.use_card.is_outline') ? trim(View::yieldContent('title')) : null }}"
                            theme="{{ config('admlte.use_card.color') }}"
                            theme-mode="{{ config('admlte.use_card.is_outline') ? 'outline' : (config('admlte.use_card.fill_color') ? 'full' : '') }}">

                            <x-slot name="toolsSlot">
                                @yield('card_tools')
                            </x-slot>

                            @yield('content')
                        </x-admlte-card>
                    @else
                        @yield('content')
                    @endif
                </div>
            </div>
            <!--begin::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->
