<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::latest()->paginate(10);
        return view("tasks.index", compact("tasks"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("tasks.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "title" => "required|string|max:255",
            "description" => "nullable|string",
            "due_date" => "nullable|date|after_or_equal:today"
        ]);

        Task::create($data);

        return redirect()->route("tasks.index")->with("success", "Task created!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view("tasks.show", compact("task"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view("tasks.edit", compact("task"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            "title" => "required|string|max:255",
            "description" => "nullable|string",
            "due_date" => "nullable|date|after_or_equal:today"
        ]);

        $task->update($data);

        return redirect()->route("tasks.index")->with("success", "Task updated");
    }

    public function toggle(Task $task)
    {
        $task->update(['is_completed' => !$task->is_completed]);
        return redirect()->route('tasks.index')->with('success', 
            $task->is_completed ? 'Task marked incomplete!' : 'Task completed! ✅'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route("tasks.index")->with("success", "Task deleted");
    }
}
