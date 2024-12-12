<x-app-layout>
    <div class="container">
        <div class="row">
            @foreach ($tasks as $task)
                <div class="col-3 offset-1">
                    <div class="card m-3" style="width: 18rem;">
                        <div class="card-body">
                            <h3 class="card-title"><b>{{ $task->title }}</b></h3>
                            <h6 class="card-subtitle mb-2 text-body-secondary"> Due Date-{{ $task->due_date }}</h6>
                            <p class="card-text">{{ $task->description }}</p>
                            <a href="{{ route('task-edit', $task->id) }}" class="btn btn-outline-success">Edit</a>
                            <a href="" class="btn btn-outline-success">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
