<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|string',
            'description'=>'required',
        ]);
        $task = task::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'status'=>$request->status,
            'due_date'=>$request->due_date,
            'user_id'=>Auth::user()->id,
        ]);
        return redirect()->back()->with('success', "Task has been created!");
    }

    /**
     * Display the specified resource.
     */

    public function show()
    {
        $tasks = Task::limit(20)->get();
        return view('welcome', ['tasks' => $tasks]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task = Task::find($id);
        return view('task-edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->status = $request->input('status');
        $task->due_date = $request->input('due_date');
        $task->save();
        return redirect()->back()->route('task-edit')->with('success', "Task has been Updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
