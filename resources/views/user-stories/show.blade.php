@extends('layouts.base')
@section('title', 'User Stories')

@section('content')

    <div class="container-fluid">  
        <h2>User Stories</h2>

        <a href="{{ route('dashboard.user_stories_create', $project_id) }}">New User Story</a>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Code</th>
                    <th scope="col">Status</th>
                    <th scope="col">Condition</th>
                    <th scope="col">Expectation</th>
                    <th scope="col">Objective</th>
                    <th scope="col">Test</th>
                    <th scope="col">Feedbacks</th>
                    <th scope="col">Tested at</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user_stories as $user_story)
                    <tr>
                        <td>{{ $user_story->id }}</td>
                        <td>{{ $user_story->code }}</td>
                        <td>{{ $user_story->status }}</td>
                        <td>{{ $user_story->condition }}</td>
                        <td>{{ $user_story->expectation }}</td>
                        <td>{{ $user_story->objective }}</td>
                        <td>{{ $user_story->test }}</td>
                        <td>{{ $user_story->feedbacks }}</td>
                        <td>{{ $user_story->tested_at }}</td>
                        {{-- <td><a href="{{ route('dashboard.user_stories_post', ['project' => $user_story->project_id, 'id' => $user_story->id])  }}">Edit</a></td> --}}
                        <td><a href="{{ route('dashboard.user_stories_edit', ['project' => $user_story->project_id, 'user_story' => $user_story->id])  }}">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
