<x-app-layout>
    <div class="container">
        <div class="row">
            @foreach ($tasks as $task)
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $task->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                            <p class="card-text">{{ $task->description }}</p>
                            <a href="{{ route('task-edit', $task->id) }}" class="btn btn-warning">Edit</a>
                            <a href="" class="btn btn-warning">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</x-app-layout>
