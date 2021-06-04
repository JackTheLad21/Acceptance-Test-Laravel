@extends('layouts.auth')
@section('title', 'Forgot Password')

@section('content')

    <!--begin::Forgot-->
    <div class="login-form">
        <div class="text-center mb-10 mb-lg-20">
            <h3 class="">Password dimenticata ?</h3>
            <p class="text-muted font-weight-bold">Inserisci la tua email per resettare la tua password</p>
        </div>
        <!--begin::Form-->
        <form class="form" novalidate="novalidate" id="kt_login_forgot_form">
            <div class="form-group py-3 border-bottom mb-10">
                <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="email" placeholder="Email" name="email" autocomplete="off" />
            </div>
            <div class="form-group d-flex flex-wrap flex-center">
                <button id="kt_login_forgot_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Invia</button>
                <a href="{{ url('/login') }}" class="btn btn-outline-primary font-weight-bold px-9 py-4 my-3 mx-2">Annulla</a>
            </div>
        </form>
        <!--end::Form-->
    </div>
    <!--end::Forgot-->

@endsection
