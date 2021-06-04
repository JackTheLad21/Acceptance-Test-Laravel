@extends('layouts.auth')
@section('title', 'Register')

@section('content')

    <!--begin::Signup-->
    <div class="login-form">
        <div class="text-center mb-10 mb-lg-20">
            <h3 class="">Registrati</h3>
            <p class="text-muted font-weight-bold">Inserisci i tuoi dati per creare un account</p>
        </div>
        <!--begin::Form-->
        <form class="form" novalidate="novalidate">
            <div class="form-group py-3 m-0">
                <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text" placeholder="Nome completo" name="fullname" autocomplete="off" />
            </div>
            <div class="form-group py-3 border-top m-0">
                <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="password" placeholder="Email" name="email" autocomplete="off" />
            </div>
            <div class="form-group py-3 border-top m-0">
                <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="password" placeholder="Password" name="password" autocomplete="off" />
            </div>
            <div class="form-group py-3 border-top m-0">
                <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="password" placeholder="Conferma password" name="cpassword" autocomplete="off" />
            </div>
            <div class="form-group mt-5">
                <div class="checkbox-inline">
                    <label class="checkbox checkbox-outline">
                    <input type="checkbox" name="agree" />
                    Accetto i <a href="#" class="ml-1">termini e le condizioni</a>.</label>
                </div>
            </div>
            <div class="form-group d-flex flex-wrap flex-center">
                <button class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Invia</button>
                <a href="{{ url('/login') }}" class="btn btn-outline-primary font-weight-bold px-9 py-4 my-3 mx-2">Annulla</a>
            </div>
        </form>
        <!--end::Form-->
    </div>
    <!--end::Signup-->

@endsection
