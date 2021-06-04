@extends('layouts.auth')
@section('title', 'Login')

@section('content')

    <!--begin::Signin-->
    <div class="login-form login-signin">
        <div class="text-center mb-10 mb-lg-20">
            <h2 class="font-weight-bold">Login</h2>
            <p class="text-muted font-weight-bold">Inserisci la tua email e password</p>
        </div>
        <!--begin::Form-->
        <form class="form" novalidate="novalidate" id="kt_login_signin_form" action="{{ url('/login') }}" method="POST">
            @csrf

            <div class="form-group py-3 m-0">
                <input class="form-control h-auto border-0 px-0 placeholder-dark-75 @error('email') is-invalid @enderror" type="Email" placeholder="Email" name="email" autocomplete="off" />
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group py-3 border-top m-0">
                <input class="form-control h-auto border-0 px-0 placeholder-dark-75 @error('password') is-invalid @enderror" type="Password" placeholder="Password" name="password" />
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- <div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-3">
                <div class="checkbox-inline">
                    <label class="checkbox checkbox-outline m-0 text-muted">
                        <input type="checkbox" name="remember" />
                        Ricordami
                    </label>
                </div>
                <a href="{{ url('/forgot-password') }}" id="kt_login_forgot" class="text-muted text-hover-primary">Forgot Password ?</a>
            </div> --}}

            <div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-2">
                <button id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3">Login</button>
            </div>

        </form>
        <!--end::Form-->
    </div>
    <!--end::Signin-->

@endsection
