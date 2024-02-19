<?php

use App\Http\Requests\RequestTask;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('task.index');
});

Route::get('/tasks', function () {
    return view('index', ['tasks' => Task::latest()->paginate(5)]);
})->name('task.index');

Route::get('/tasks/create', function () {
    return view('create');
})->name('task.create');

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', ['task' => $task]);
})->name('task.show');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', ['task' => $task]);
})->name('task.edit');

Route::post('/tasks/create', function (RequestTask $request) {
    Task::create($request->validated());
    return redirect()->route('task.index')->with('success', 'The task is created successfully!');
})->name('task.store');

Route::put('/tasks/{task}/edit', function (Task $task, RequestTask $request) {
    $task->update($request->validated());
    return redirect()->route('task.index')->with('success', 'The task is updated successfully!');
})->name('task.update');

Route::put('/tasks/{task}', function (Task $task) {
    $task->toggleTaskStatus();
    return redirect()->back()->with('success', 'The task status is updated successfully!');
})->name('task.toggle-complete');

Route::delete('/tasks/{task}/delete', function (Task $task) {
    $task->delete();
    return redirect()->route('task.index')->with('success', 'The task is deleted successfully!');
})->name('task.delete');
