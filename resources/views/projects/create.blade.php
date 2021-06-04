@extends('layouts.base')
@section('title', 'Add Project')

@section('content')

    <form method="post" action="{{ route('dashboard.projects_store') }}">
        {{-- <form> --}}
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Project Name</label>
            <input type="text" name="name" class="form-control" id="name">
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">Client ID</label>
            <input type="number" name="user_id" class="form-control" id="user_id">
        </div>
        {{-- <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> --}}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection