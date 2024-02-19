@extends('layouts.index')

@section('title', 'The Task Detail')

@section('content')
    <div>
        @include('subviews.task-item', ['task_title' => 'Title', 'task_content' => $task->title])
        @include('subviews.task-item', [
            'task_title' => 'description',
            'task_content' => $task->description,
        ])
        @include('subviews.task-item', [
            'task_title' => 'long description',
            'task_content' => $task->long_description,
        ])
        <div>Created {{ $task->created_at }}</div>
        <div>Updated {{ $task->updated_at }}</div>
        @if ($task->completed)
            <p class="completed">Completed</p>
        @else
            <p class="uncompleted">Not Completed</p>
        @endif
        <form action="{{ route('task.toggle-complete', ['task' => $task]) }}" method="post">
            @csrf
            @method('put')
            <button class="my-3" type="submit">Mark as {{ $task->completed ? 'Not Completed' : 'Completed' }}</button>
        </form>
        <div class="flex items-center space-x-1 my-3">
            <div>
                <a href="{{ route('task.edit', ['task' => $task]) }}" class="link">Edit
                    Task</a>
            </div>
            <form action="{{ route('task.delete', ['task' => $task]) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit">Delete Task</button>
            </form>
            @include('subviews.link', ['link_route' => 'task.index', 'link_title' => 'Back to tasks list'])
        </div>
    </div>
@endsection
