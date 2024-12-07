<x-app-layout>
<div class="container" style="margin-top: 150px">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form method="PATCH" action="{{ route('task-update', $task->id) }}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title" value="{{ $task->title }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"> Description </label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="description" value="{{ $task->description }}">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" value="{{ $task->status }}">
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="done">Done</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="dueDate" class="form-label">Due Date</label>
            <input type="date" class="form-control" id="dueDate" name="due_date" value="{{ $task->due_date }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</x-app-layout>