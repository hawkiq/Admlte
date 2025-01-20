<div class="preloader flex-column justify-content-center align-items-center">

    {{-- loading logo --}}
    <img src="{{ asset(config('admlte.loading.img.path', 'vendor/admlte/dist/img/AdmLTELogo.png')) }}"
        class="{{ config('admlte.loading.img.effect', 'animation__shake') }}"
        alt="{{ config('admlte.loading.img.alt', 'Admin LTE v4 Preloader Image') }}"
        width="{{ config('admlte.loading.img.width', 60) }}" height="{{ config('admlte.loading.img.height', 60) }}">

</div>
@push('css')
    <style>
        .preloader {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: $main-bg;
            height: 100vh;
            width: 100%;
            transition: height 200ms linear;
            position: fixed;
            left: 0;
            top: 0;
            z-index: $zindex-preloader;
        }
    </style>
@endpush
