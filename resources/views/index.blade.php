@extends('layouts.index')


@section('title', 'The Tasks List')

@section('content')
    @include('subviews.link', ['link_route' => 'task.create', 'link_title' => 'Add New Task'])
    @if (count($tasks))
        @foreach ($tasks as $task)
            <div class="my-3 border rounded {{ $task->completed ? 'bg-gray-300' : '' }}">
                <a href="{{ route('task.show', ['task' => $task]) }}" class="block p-2">{{ $task->title }}</a>
            </div>
        @endforeach
        <div>
            {{ $tasks->links() }}
        </div>
    @else
        There are no tasks!
    @endif
@endsection
