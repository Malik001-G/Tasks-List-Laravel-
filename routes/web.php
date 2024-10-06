<?php


use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});
Route::get('/tasks', function () {
    // $tasks = Task::all();
    $tasks = Task::latest()->get();
    return view('index', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) {
    $task = Task::findOrFail($id);
    return view('show', ['task' => $task]);
})->name('tasks.show');