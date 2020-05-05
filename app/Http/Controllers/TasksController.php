<?php

namespace App\Http\Controllers;
use App\Task;
use App\User;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTask;
use App\Notifications\TaskAdded;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;



class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::where('online', true)->get();
       $tasks = Task::all();
        return view ('taskslist')->with(['tasks'=> $tasks, 'users'=>$users ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createtask');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTask $request)
    {

        //dd($request->all());
        
        $task =Task::create($request->all());
       
        

        $users = User::where('department', 'Supervisor')->get();
        Notification::send($users, new TaskAdded($task->id));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view ('edittask')->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTask $request, $id)
    {
        $task=Task::find($id);
        $task->update($request->all());

        return redirect ('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateTaskStatus(Request $request)
    {

        
       $task=Task::find($request->id);
       $task->status = 'reviewed by supervisor';
       $task->save();
        $task->save();
       

    }

    public function createComment(Request $request){

        $request->validate([
            'comment' => '|required|string|max:300',
            'task_id' => 'required'
        ]);

        $comment=Comment::create([
            'task_id' => $request->task_id,
            'user_id' => Auth()->user()->id,
            'body' => $request->comment
            


    ]);
    }

    public function markAsRead(Request $request)
            {
                $id=$request->id;
                $notification = DB::table('notifications')->where('id', $id)->update([

                    'read_at' => now()
                ]);
              
              /*  $notification->update([

                'read_at' => now()
               ]);*/
             //  return response($notification);

            }

}
