<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Tasks/Index', [
            'tasks' => Task::with('module', 'techExpert')->latest()->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Tasks/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'module_id' => 'required|exists:modules,id',
            'tech_expert_id' => 'required|exists:users,id',
            'title' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|in:todo,in_progress,done',
        ]);

        Task::create($validated);

        return redirect()->route('admin.tasks.index')->with('success', 'Task created.');
    }

    public function edit(Task $task)
    {
        return Inertia::render('Admin/Tasks/Edit', [
            'task' => $task
        ]);
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|in:todo,in_progress,done',
        ]);

        $task->update($validated);

        return redirect()->route('admin.tasks.index')->with('success', 'Task updated.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('admin.tasks.index')->with('success', 'Task deleted.');
    }
}
