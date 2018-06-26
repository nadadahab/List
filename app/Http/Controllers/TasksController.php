<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Response;

class TasksController extends Controller
{
    public function index()
    {
         $tasks=Task::all();

        return Response::json($tasks);
        
    }
     
      public function indexAll()
    {
         $tasks=Task::all();

         return view('tasks.index',[
            'tasks' => $tasks
        ]);
    }

 
    public function store(Request $request)
    {
         $task = Task::create([
            'name' => $request->name,
        ]);
        
             return Response::json($task);

    }
    
    public function destroy(Request $request,$id)
    {
        $task = Task::find($id);
        $task->delete();
    }

}
