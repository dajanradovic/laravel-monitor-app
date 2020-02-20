<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;

class SupervisorController extends Controller


{

    public $tasks;
    public function newTasks(){

        $users=User::where('online', true)->get();

        /*foreach (Auth()->user()->notifications as $notification){
        

                         $tasks = Task::where('id', $notification->data['taskId'])->get();
        }

                         dd($tasks->all());*/

                         $tasks= Task::all();
        
        return view ('supervisor.newtasks')->with(['tasks'=> $tasks, 'users'=>$users ]);

    }



}
