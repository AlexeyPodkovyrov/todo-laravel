<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('id', 'desc')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255'
        ]);

        Task::create([
            'title' => $request->title,
            'completed' => true
        ]);

        return redirect()->route('tasks.index');
    }

    public function toggle(Task $task)
    {
        $task->update([
            'completed' => !$task->completed
        ]);
        
        return redirect()->route('tasks.index');
    }
}
