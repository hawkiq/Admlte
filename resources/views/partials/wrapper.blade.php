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
                        <div
                            class="card @if (config('admlte.use_card.is_outline')) card-outline @endif {{ config('admlte.use_card.color') }} @if (config('admlte.use_card.fill_color')) {{ config('admlte.use_card.fill_color') }} @endif">
                            <div class="card-header">
                                <h3 class="card-title">@yield('title')</h3>
                                <div class="card-tools">
                                    @yield('card_tools')
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @yield('content')
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
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
