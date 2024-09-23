<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Tasks;
use App\Models\UserTasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Tasks::all();
        return Inertia::render('Tasks/List', compact('tasks'));
    }

    // Show the form for creating a new task
    public function create()
    {
        return Inertia::render('Tasks/Create');
    }

    // Store a newly created task in storage
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:todo,in-progress,done',
            'priority_level' => 'nullable|string',
        ]);
        $request->merge(['created_by' => Auth::user()->id]);

        Tasks::create($request->all());
        return redirect()->route('tasks')->with('success', 'Task created successfully.');
    }

    public function show($id) {}

    public function edit(Tasks $task) {}

    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:todo,in-progress,done',
            'priority_level' => 'nullable|integer',
        ]);

        $updatedTask = Tasks::where('id', $id)->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy($id)
    {
        $task = Tasks::find($id);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    public function assign($id, Request $request)
    {
        $task = Tasks::find($id);

        if ($task) {
            UserTasks::create([
                'user_id' => $request->user_id,
                'task_id' => $task->id,
                'assigned_by' => Auth::user()->id,
                'assigned_date' => now(),
                'due_dates' => $request->due_date
            ]);
        }

        return redirect()->route('tasks')->with('success', 'Task assigned successfully.');
    }
}
