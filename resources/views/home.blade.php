@extends('layouts.base')
@section('title', 'Home')

@section('content')

    <div class="container-fluid">  
        <h2>Projects</h2>
        <a class="justify-content-md-end" href="{{ route('dashboard.projects_create') }}">Add Project</a>
        {{-- <a class="justify-content-md-end" href="{{ url('/project/add') }}">Add Project</a> --}}
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Edit</th>
                    <th scope="col">User Stories</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->name }}</td>                        
                        <td><a href={{ route('dashboard.projects_edit', ['project' => $project->id])  }}>Edit</a></td>
                        <td><a href="{{ route('dashboard.user_stories_index', ['project' => $project->id])  }}">View</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
