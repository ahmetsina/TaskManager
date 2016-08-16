<?php

namespace App\Http\Controllers;


use App\Task;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;
class TaskController extends Controller
{


    protected $tasks;


    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');

        $this->tasks = $tasks;
    }

    public function index(Request $request)
    {
        $tasks = $request->user()->tasks()->get();

        return view('tasks.index',[
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    public function create()
    {
        //return response()->json(['name' => 'Abigail','state' => 'CA']);
        return view('tasks.addTask', ['baslik' => 'Görev Ekle']);
}
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $request->user()->tasks()->create([
            'name' => $request ->name,
            'task_picture' => $request ->task_picture,
        ]);
        return redirect('/tasks');
    }

    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy',$task);

        $task->delete();

        return redirect('/tasks');
    }
}
