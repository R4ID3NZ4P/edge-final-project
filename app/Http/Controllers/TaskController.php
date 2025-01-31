<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
{
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'You need to log in first.');
    }

    $tasks = auth()->user()->tasks ?? collect(); // Ensures $tasks is always iterable
    return view('tasks.index', compact('tasks'));
}

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        auth()->user()->tasks()->create([
            'title' => $request->title,
        ]);

        return redirect()->route('tasks.index');
    }

    public function update(Task $task)
    {
        $task->update([
            'is_completed' => !$task->is_completed,
        ]);

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}