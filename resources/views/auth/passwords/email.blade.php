@extends('admlte::master', ['auth_type' => 'login'])
@section('title', admlte_translate('forgot_password'))

@php($login_url = View::getSection('login_url') ?? config('admlte.login_url', 'login'))
@php($password_email_url = View::getSection('password_email_url') ?? config('admlte.password_email_url', 'password/email'))


@section('body')
    <div class="login-box">
        <div
            class="card {{ config('admlte.auth_card_fill_class') }} {{ config('admlte.auth_card_fill') ? '' : 'card-outline' }} {{ config('admlte.auth_card_color') }}">
            <div class="card-header">

                <h2 class="mb-0">{{ config('admlte.website_name') }} <img src="{{ asset(config('admlte.logo_img')) }}"
                        class="img-fluid" /> </h2>
            </div>
            <div class="card-body login-card-body">
                <p class="login-box-msg">{{ admlte_translate('forgot_password_hint') }}</p>

                <form action="{{ route($password_email_url) }}" method="post">
                    @csrf
                    <div class="input-group mb-1">
                        <div class="form-floating">
                            <input id="loginEmail" name="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                placeholder="" required autofocus />
                            <label for="loginEmail">{{ admlte_translate('email') }}</label>
                        </div>
                        <div class="input-group-text"><span class="fas fa-fw fa-envelope"></span></div>
                        @error('email')
                            <div class="invalid-feedback d-block">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="d-grid gap-2">
                                <button type="submit"
                                    class="btn {{ config('admlte.auth_card_btn_color', 'btn-primary') }}">{{ admlte_translate('email_password') }}</button>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!--end::Row-->
                </form>

                @if ($login_url)
                    <p class="mt-3">
                        <a class='text-center' href='{{ route($login_url) }}'> {{ admlte_translate('sign_in') }} </a>
                    </p>
                @endif
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
@endsection
