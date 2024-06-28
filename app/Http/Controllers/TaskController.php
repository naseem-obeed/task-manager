<?php 
// app/Http/Controllers/TaskController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;

class TaskController extends Controller
{
    public function create(Project $project)
    {
        return view('tasks.create', compact('project'));
    }

    public function store(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'queue',
            'project_id' => $project->id,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('projects.show', $project)->with('success', 'Task created successfully.');
    }

    public function updateStatus(Task $task, $status)
    {
        $task->update(['status' => $status]);
        return redirect()->back()->with('success', 'Task status updated.');
    }
}
