@extends('layouts.base')
@section('title', 'Add Project')

@section('content')

    <form method="post" action={{ route('dashboard.projects_update', $project->id) }}>
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Project Name</label>
            <input type="text" name="name" class="form-control" id="name"
            value="{{ $project->name }}">
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">Client ID</label>
            <input type="number" name="user_id" class="form-control" id="user_id"
            value="{{ $project->user_id }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection