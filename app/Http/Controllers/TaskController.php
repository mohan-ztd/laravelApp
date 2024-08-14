<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    //
    // Display a list of tasks
    public function index(Request $request)
    {
        if($request->type == 1)
        $tasks = Task::where('status','!=',1)->get();
        else
        $tasks = Task::all(); // Retrieve all tasks from the database
        return view('postdata', compact('tasks')); // Pass tasks to the view
    }

    // Show the form for creating a new task
    public function create(Request $request)
    {
        //dd($request->all());
        Task::create(['task_name' => $request->name]);
      //  return view('tasks.create'); // Return the view for creating a task
      return 1;
    }
    // update status
    public function update(Request $request){
        Task::where('id',$request->id)->update(['status'=>1]);
        return 1;
    }
    public function delete(Request $request){
        Task::where('id',$request->id)->delete();
        return 1;
    }
}
