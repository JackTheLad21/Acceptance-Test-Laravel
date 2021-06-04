@extends('layouts.base')
@section('title', 'Add Project')

@section('content')

    <form method="post" action="{{ route('dashboard.user_stories_post', $project_id) }}">
        {{-- <form> --}}
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">User Story Name</label>
            <input type="text" class="form-control" id="name">
        </div>
        <div class="mb-3">
            <label for="code" class="form-label">Code</label>
            <input type="number" name="code" class="form-control" id="code">
        </div>
        <div class="mb-3">
            <label for="condition" class="form-label">Condition</label>
            <input type="text" name="condition" class="form-control" id="condition">
        </div>
        <div class="mb-3">
            <label for="expectation" class="form-label">Expectation</label>
            <input type="text" name="expectation" class="form-control" id="expectation">
        </div>
        <div class="mb-3">
            <label for="objective" class="form-label">Objective</label>
            <input type="text" name="objective" class="form-control" id="objective">
        </div>
        <div class="mb-3">
            <label for="test" class="form-label">Test</label>
            <input type="text" name="test" class="form-control" id="test">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

        {{-- @if (isset($errors) && count($errors))
     
            There were {{count($errors->all())}} Error(s)
                        <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }} </li>
                    @endforeach
                </ul>
                
        @endif --}}
    </form>

@endsection