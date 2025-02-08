@extends('admlte::master', ['auth_type' => 'login'])
@section('title', admlte_translate('sign_in'))

@php
    $login_url = View::getSection('login_url') ?? config('admlte.login_url', 'login');
    $register_url = View::getSection('register_url') ?? config('admlte.register_url', 'register');
    $password_reset_url =
        View::getSection('password_reset_url') ?? config('admlte.password_reset_url', 'password/reset');

    if (config('admlte.use_route_url', false)) {
        $login_url = $login_url ? route($login_url) : '';
        $register_url = $register_url ? route($register_url) : '';
        $password_reset_url = $password_reset_url ? route($password_reset_url) : '';
    } else {
        $login_url = $login_url ? url($login_url) : '';
        $register_url = $register_url ? url($register_url) : '';
        $password_reset_url = $password_reset_url ? url($password_reset_url) : '';
    }

@endphp


@section('body')
    <div class="login-box">
        <div
            class="card {{ config('admlte.auth_card_fill_class') }} {{ config('admlte.auth_card_fill') ? '' : 'card-outline' }} {{ config('admlte.auth_card_color') }}">
            <div class="card-header">

                <h2 class="mb-0">{{ config('admlte.website_name') }} <img src="{{ asset(config('admlte.logo_img')) }}"
                        class="img-fluid" /> </h2>
            </div>
            <div class="card-body login-card-body">
                <p class="login-box-msg">{{ admlte_translate('sign_in_hint') }}</p>

                <form action="{{ $login_url }}" method="post">
                    @csrf
                    @if (config('admlte.username_enabled'))
                        <div class="input-group mb-1">
                            <div class="form-floating">
                                <input id="loginUsername" name="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror"
                                    value="{{ old('username') }}" placeholder="" />
                                <label for="loginUsername">{{ admlte_translate('username') }}</label>
                            </div>
                            <div class="input-group-text"><span class="fas fa-fw fa-user"></span></div>
                            @error('username')
                                <div class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    @else
                        <div class="input-group mb-1">
                            <div class="form-floating">
                                <input id="loginEmail" name="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                    placeholder="" />
                                <label for="loginEmail">{{ admlte_translate('email') }}</label>
                            </div>
                            <div class="input-group-text"><span class="fas fa-fw fa-envelope"></span></div>
                            @error('email')
                                <div class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    @endif
                    <div class="input-group mb-1">
                        <div class="form-floating">
                            <input id="loginPassword" name="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="" />
                            <label for="loginPassword">{{ admlte_translate('password') }}</label>
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
                        <div class="col-12 d-inline-flex align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }} />
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{ admlte_translate('remember_me') }}
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-12 mt-3">
                            <div class="d-grid gap-2">
                                <button type="submit"
                                    class="btn {{ config('admlte.auth_card_btn_color', 'btn-primary') }}">{{ admlte_translate('sign_in') }}</button>
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
                </div>
                <!-- /.social-auth-links --> --}}
                @if ($password_reset_url)
                    <p class="mt-3"><a href="{{ $password_reset_url }}">{{ admlte_translate('forgot_password') }}</a>
                    </p>
                @endif
                @if ($register_url)
                    <p class="mt-3">
                        <a class='text-center' href='{{ $register_url }}'> {{ admlte_translate('register') }} </a>
                    </p>
                @endif
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
@endsection
