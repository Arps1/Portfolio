@foreach($projects as $project)
    <div class="card">
        <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $project->title }}</h5>
            <p class="card-text">{{ $project->description }}</p>
            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endforeach
