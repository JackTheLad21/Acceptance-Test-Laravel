@extends('layouts.base')
@section('title', 'Add Project')

@section('content')

    <form method="post" action="{{ route('dashboard.user_stories_update', ['project' => $user_story->project_id, 'user_story' => $user_story->id]) }}">
        @csrf
        @method('PUT')
        {{-- <div class="mb-3">
            <label for="name" class="form-label">User Story Name</label>
            <input type="text" class="form-control" id="name"
            value="{{ $user_story->name }}">
        </div> --}}
        <div class="mb-3">
            <label for="code" class="form-label">Code</label>
            <input type="number" name="code" class="form-control" id="code"
            value="{{ $user_story->code }}">
        </div>
        <div class="mb-3">
            <label for="condition" class="form-label">Condition</label>
            <input type="text" name="condition" class="form-control" id="condition"
            value="{{ $user_story->condition }}">
        </div>
        <div class="mb-3">
            <label for="expectation" class="form-label">Expectation</label>
            <input type="text" name="expectation" class="form-control" id="expectation"
            value="{{ $user_story->expectation }}">
        </div>
        <div class="mb-3">
            <label for="objective" class="form-label">Objective</label>
            <input type="text" name="objective" class="form-control" id="objective"
            value="{{ $user_story->objective }}">
        </div>
        <div class="mb-3">
            <label for="test" class="form-label">Test</label>
            <input type="text" name="test" class="form-control" id="test"
            value="{{ $user_story->test }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

@endsection