<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                         $unreadTasksAdded = Auth()->user()->unreadNotifications->where('type', 'App\Notifications\TaskAdded');
        
        return view ('supervisor.newtasks')->with(['tasks'=> $tasks, 'users'=>$users, 'unreadTasksAdded' => $unreadTasksAdded ]);

    }

    public function markMessageAsRead(Request $request){

        $id=$request->id;
        $notification = DB::table('notifications')->where('id', $id)->update([

            'read_at' => now()
        ]);
    }






}
