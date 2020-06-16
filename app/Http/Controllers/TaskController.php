<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TaskRepository;
use App\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function delete(TaskRepository $taskRepo, $id){
        $user = $taskRepo->delete($id);
        return redirect('task');
    }

    public function edit(TaskRepository $taskRepo, $id){
        $user = $taskRepo->find($id);
        $user->done = 'true';
        $user->save();

        return redirect('task');
    }

    public function add(Request $request)
    {
        $id = Auth::user()->id;

        $newTask = new Task();
        $newTask->task = $request->input('task');
        $newTask->deadline = $request->input('deadline');
        $newTask->done = $request->input('done');
        $newTask->user_id = $id;

        $newTask->save();

        return redirect('task');
    }
}
