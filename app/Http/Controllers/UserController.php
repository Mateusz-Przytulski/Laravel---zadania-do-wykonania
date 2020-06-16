<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepository;



class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view(UserRepository $userRepo, TaskRepository $taskRepo){

        $user = $userRepo->getAllUsers();
        $task = $taskRepo->getAllTasks();
        $id = Auth::user()->id;

        return view('task', ["users"=>$user, "tasks"=>$task, "idd"=>$id]);
    }

    public function delete(UserRepository $taskRepo, $id){
        $user = $taskRepo->delete($id);
        return redirect('view');
    }

}
