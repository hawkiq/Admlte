@extends('admlte::master')

@section('body')
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        @include('admlte::components.navbar')
        @include('admlte::components.sidebar')
        @include('admlte::partials.wrapper')
        @hasSection('footer')
            @include('admlte::partials.footer')
        @endif
        {{-- @include('admlte::partials.loading') --}}
    </div>
    <!--end::App Wrapper-->
@stop
