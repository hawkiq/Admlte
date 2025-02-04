@extends('admlte::master', ['auth_type' => 'login'])
@section('title', admlte_translate('register'))

@php
    $login_url = View::getSection('login_url') ?? config('admlte.login_url', 'login');
    $register_url = View::getSection('register_url') ?? config('admlte.register_url', 'register');

    if (config('admlte.use_route_url', false)) {
        $login_url = $login_url ? route($login_url) : '';
        $register_url = $register_url ? route($register_url) : '';
    } else {
        $login_url = $login_url ? url($login_url) : '';
        $register_url = $register_url ? url($register_url) : '';
    }

@endphp

@section('body')
    <div class="register-box">
        <!-- /.register-logo -->
        <div
            class="card {{ config('admlte.auth_card_fill_class') }} {{ config('admlte.auth_card_fill') ? '' : 'card-outline' }} {{ config('admlte.auth_card_color') }}">
            <div class="card-header">
                <h2 class="mb-0">{{ config('admlte.website_name') }} <img src="{{ asset(config('admlte.logo_img')) }}"
                        class="img-fluid" /> </h2>
            </div>
            <div class="card-body register-card-body">
                <p class="register-box-msg">{{ admlte_translate('register_hint') }}</p>
                <form action="{{ $register_url }}" method="post">
                    @csrf
                    <div class="input-group mb-1">
                        <div class="form-floating">
                            <input id="registerFullName" name="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                placeholder="" />
                            <label for="registerFullName">{{ admlte_translate('full_name') }}</label>
                        </div>
                        <div class="input-group-text"><span class="fas fa-fw fa-user"></span></div>
                        @error('name')
                            <div class="invalid-feedback d-block">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-1">
                        <div class="form-floating">
                            <input id="registerEmail" name="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                placeholder="" />
                            <label for="registerEmail">{{ admlte_translate('email') }}</label>
                        </div>
                        <div class="input-group-text"><span class="fas fa-fw fa-envelope"></span></div>
                        @error('email')
                            <div class="invalid-feedback d-block">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-1">
                        <div class="form-floating">
                            <input id="registerPassword" name="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="" />
                            <label for="registerPassword">{{ admlte_translate('password') }}</label>
                        </div>
                        <div class="input-group-text"><span class="fas fa-fw fa-lock"></span></div>
                        @error('password')
                            <div class="invalid-feedback d-block">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="input-group mb-1">
                        <div class="form-floating">
                            <input id="registerPassword" name="password_confirmation" type="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="" />
                            <label for="registerPassword">{{ admlte_translate('password_confirmation') }}</label>
                        </div>
                        <div class="input-group-text"><span class="fas fa-fw fa-lock"></span></div>
                        @error('password')
                            <div class="invalid-feedback d-block">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <!--begin::Row-->
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-12">
                            <div class="d-grid gap-2">
                                <button type="submit"
                                    class="btn {{ config('admlte.auth_card_btn_color', 'btn-primary') }}">{{ admlte_translate('register') }}</button>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!--end::Row-->
                </form>
                {{-- <div class="social-auth-links text-center mb-3 d-grid gap-2">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-primary">
                        <i class="bi bi-facebook me-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-danger">
                        <i class="bi bi-google me-2"></i> Sign in using Google+
                    </a>
                </div> --}}
                <!-- /.social-auth-links -->
                <p class="mt-3">
                    <a class='link-primary text-center'
                        href='{{ $login_url }}'>{{ admlte_translate('already_signed') }}
                    </a>
                </p>
            </div>
            <!-- /.register-card-body -->
        </div>
    </div>
    <!-- /.register-box -->
@endsection
