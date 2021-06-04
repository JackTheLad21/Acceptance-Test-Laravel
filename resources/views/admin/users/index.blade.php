@extends('layouts.base')
@section('title', 'Lista Utenti')

@section('content')

<div class="container-fluid">

    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="fas fa-user-lock text-primary"></i>
                </span>
                <h3 class="card-label">Lista Utenti</h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ url('/admin/users/create') }}" class="btn btn-primary font-weight-bolder">
                    <i class="la la-plus"></i>Aggiungi
                </a>
            </div>
        </div>
        <div class="card-body">

            <!--begin: Search Form-->
            <form class="mb-15" method="get" action="{{ route('dashboard.admin.users.index') }}">
                <div class="row mb-2">
                    <div class="col-6 col-lg-4 mb-2">
                        <label>Nome:</label>
                        <input type="text" class="form-control" name="search[name]" id="keywords" placeholder="Cerca per nome" value="">
                    </div>
                    <div class="col-6 col-lg-3 mb-2">
                        <label>Ruolo:</label>
                        <select class="form-control selectpicker" name="search[role]">
                            <option value="">-- Qualsiasi ruolo --</option>
                            @foreach ($roles as $role)
                                <option {{ ($search['role'] == $role->id) ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <button type="submit" class="btn btn-primary btn-primary--icon">
                            <i class="la la-search"></i><span>Cerca</span>
                        </button>
                        &nbsp;
                        <a href="{{ route('dashboard.admin.users.index') }}" class="btn btn-secondary btn-secondary--icon">
                            <i class="la la-close"></i><span>Reimposta</span>
                        </a>
                    </div>
                </div>
            </form>
            <!-- end: Search Form -->

            <hr>

            <table class="table table-hover table-vertical-center table-responsive-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Utente</th>
                        <th>Ruoli</th>
                        <th scope="col" nowrap>@sortablelink('created_at', 'Creato')</th>
                        <th>Attivato</th>
                        <th scope="col" style="width: 100px">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-40 symbol-sm flex-shrink-0">
                                    @if($user->avatar_url)
                                        <img class="" src="{{ $user->avatar_url }}" alt="avatar">
                                    @else
                                        <span class="symbol-label font-size-h4 font-weight-bold">
                                            {{ Str::substr($user->name, 0, 1) }}
                                        </span>
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <div class="text-dark-75 font-weight-bolder font-size-lg mb-0">
                                        <span class="text-dark-75 font-weight-bolder">{{ $user->name }}</span>
                                    </div>
                                    <a href="#" class="text-muted font-weight-bold text-hover-primary">
                                        <span class="text-muted">{{ $user->email }}</span>
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td>
                            @foreach ($user->roles->pluck('name') as $role)
                                <span class="label label-pill label-inline">{{ $role }}</span>
                            @endforeach
                        </td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->email_verified_at }}</td>
                        <td nowrap>
                            <a href="{{ route('dashboard.admin.users.edit', ['user' => $user->id]) }}" class="btn btn-sm btn-clean btn-icon" title="Modifica">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-between">
                <div>
                    <span class="text-muted">Righe totali: {{ $users->total() }}</span>
                </div>
                {!! $users->links() !!}
            </div>
        </div>
    </div>
    <!--end::Card-->
</div>

@endsection
