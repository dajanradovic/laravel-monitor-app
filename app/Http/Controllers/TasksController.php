<?php

namespace App\Http\Controllers;
use App\Task;
use App\User;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTask;
use App\Notifications\TaskAdded;
use App\Notifications\TaskDelegatedToTechnician;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Gate;




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
        if (Gate::allows('isPhoneAgent', Auth()->user())) {
            return view('createtask');
            
        }

        else{

          return   'You are not authorized to add tasks';
        }
       ;
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
        $task->status="submitted";
        $task->save();
       
        

        $users = User::where('department', 'Supervisor')->get();
        Notification::send($users, new TaskAdded($task->id));
        return back()->with('success', 'you have successfully added the new task');

        
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

        return redirect ('/tasks')->with('taskEdited', 'you have successfully edited the task');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        
        
  
        $notifications = DB::table('notifications')->where('type', 'App\Notifications\TaskAdded' )->get();
       // dd($notifications);
        foreach($notifications as $notification){
                 $temporary =json_decode($notification->data, true);
             //    dd($temporary['taskId']);
            if ($temporary['taskId'] == strval($task->id)){

                DB::table('notifications')->where('id', $notification->id )->delete();
            }
        }
     
        $task->delete();
        return redirect ('/tasks')->with('taskDeleted', 'you have successfully deleted the task');


    }

    public function changeTaskStatus(Request $request)
    {
           
      
       $task=Task::find($request->id);

       
       $task->status ='reviewed by supervisor';
       $task->save();
       $notificationId=$request->notificationId;
        $notification = DB::table('notifications')->where('id', $notificationId);
        $notification->delete();
       $users=User::where('department', 'Technician on terrain')->get();
       Notification::send($users, new TaskDelegatedToTechnician($request->id));
       
        
       

    }

    public function changeTaskStatusToBeingSolved(Request $request){

                 
       $task=Task::find($request->id);
       $task->status = 'being solved';
       $task->save();
       $notificationId=$request->notificationId;
       $notification = DB::table('notifications')->where('id', $notificationId);
       $notification->delete();

    }

    public function changeTaskStatusToCompleted(Request $request){

                 
        $task=Task::find($request->id);
        $task->status = 'completed';
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

    return redirect('/tasks')->with('success', 'you have successfully added the comment');
    }

   

}
