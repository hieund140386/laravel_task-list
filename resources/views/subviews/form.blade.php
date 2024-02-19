<form action="{{ isset($task) ? route('task.update', ['task' => $task]) : route('task.store') }}" method="POST">
    @csrf
    @if (isset($task))
        @method('PUT')
    @endif
    <div>
        <label class="label" for="title">Title</label>
        <input class="content" type="text" name="title" id="title"
            value="{{ isset($task) ? $task->title : old('title') }}">
        @error('title')
            <p class="err-msg">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label class="label" for="description">description</label>
        <textarea class="content" name="description" id="description">
            {{ isset($task) ? $task->description : old('description') }}
        </textarea>
        @error('description')
            <p class="err-msg">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label class="label" for="long_description">long description</label>
        <textarea class="content" name="long_description" id="long_description" rows="5">{{ isset($task) ? $task->long_description : old('long_description') }}</textarea>
        @error('long_description')
            <p class="err-msg">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex items-center space-x-2">
        <button class="btn" type="submit">
            {{ isset($task) ? 'Update' : 'Create' }}
        </button>
        @include('subviews.link', ['link_route' => 'task.index', 'link_title' => 'Cancel'])
    </div>
</form>
