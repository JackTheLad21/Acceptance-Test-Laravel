@extends('layouts.base')
@section('title', 'Form Utente')

@section('content')

    <div class="container-fluid">

        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="fas fa-user-lock text-primary"></i>
                    </span>
                    <h3 class="card-label">Form Utente</h3>
                </div>
            </div>
            <div class="card-body">

                @if ($user->id)

                    <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('dashboard.admin.users.update', ['user' => $user->id]) }}">
                        @method('PATCH')
                        @csrf

                @else

                    <form class="form" method="POST" enctype="multipart/form-data" action="{{ route('dashboard.admin.users.store') }}">
                        @csrf

                @endif


                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-3 col-sm-12">Nome completo *</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" placeholder="Il nome"
                                       value="{{ old('name', $user->name) }}"/>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-3 col-sm-12">Email *</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                       name="email" placeholder="La email"
                                       value="{{ old('email', $user->email) }}"/>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-3 col-sm-12">Password *</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       name="password"
                                       autocomplete="off"
                                       placeholder="Lascia in bianco se non vuoi modificare la password"/>
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-3 col-sm-12">Avatar</label>

                            <div class="image-input image-input-outline ml-4" id="kt_image" style="background-image: url('dashboard/empty.png')">
                                <div class="image-input-wrapper" style="background-image: url({!! $user->avatar_url !!})"></div>

                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove"/>
                                </label>

                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>

                                @if($user->avatar)
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                @endif

                            </div>

                        </div>

                        <div class="separator separator-dashed my-5"></div>

                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-3 col-sm-12">Ruoli *</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <div class="checkbox-list @error('roles') is-invalid @enderror">
                                    @foreach ($roles as $role)
                                        <label class="checkbox">
                                            <input type="checkbox" name="roles[]"
                                                   value="{{ $role }}" {{ ($user->hasRole($role)) ? 'checked' : '' }} />
                                            <span></span>{{ $role }}
                                        </label>
                                    @endforeach
                                </div>
                                @error('roles')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <button type="submit" class="btn btn-primary font-weight-bold mr-2">Salva
                                </button>
                                <a href="{{ url('/admin/users') }}" class="btn btn-secondary">Annulla</a>
                                @if ($user->id)
                                    <div class="mt-2">
                                        <span class="font-size-xs text-muted">Aggiornato <strong>{{ $user->updated_at }}</strong></span>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </form>

            </div>
        </div>

    </div>

@endsection


@section('scripts')

    <script>

        $(document).ready(function(){

            var avatarFunct = new KTImageInput('kt_image');

        });

    </script>

@endsection
