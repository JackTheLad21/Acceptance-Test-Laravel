<div>
    <h2>Projects</h2>
    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->name }}</td>
                    <td><a href={{ route('user-stories.show'), $project->id }}>View</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>