<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::get();
        return view('index', compact('tasks'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
    
        $task = new Task;
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->user_id = Auth::id();
        $task->save();
    
        return redirect()->route('tasks')->with('success', 'Task created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::findOrFail($id);

    return view('show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);

        //Check if the authenticated user is authorized to edit the task
        if ($task->user_id !== auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('edit', compact('task'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $task = Task::findOrFail($id);
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->save();

        return redirect()->route('tasks')->with('success', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        //Check if the authenticated user is authorized to delete the task
        if ($task->user_id !== auth()->user()->id) {
            abort(403, 'Unauthorized action.');
        }

        $task->delete();

        return redirect()->route('tasks')->with('success', 'Task deleted successfully');
    }
}
