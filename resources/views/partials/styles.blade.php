<!--begin::Third Party Plugin(OverlayScrollbars)-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
    integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg=" crossorigin="anonymous" />
<!--end::Third Party Plugin(OverlayScrollbars)-->
<!--begin::Third Party Plugin(FontAwesome Icons)-->
<link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/all.min.css') }}" />
<!--end::Third Party Plugin(FontAwesome Icons)-->
<!--begin::Required Plugin(AdminLTE)-->
@if (in_array(app()->getLocale(), ['ar', 'he']))
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/adminlte.rtl.min.css') }}" />
@else
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/adminlte.min.css') }}" />
@endif
<!--end::Required Plugin(AdminLTE)-->
