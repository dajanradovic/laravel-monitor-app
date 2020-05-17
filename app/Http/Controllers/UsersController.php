<?php

namespace App\Http\Controllers;

use App\User;
use App\Subject;
use App\PrivateMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Notifications\NewPrivateMessage;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Notification;

class UsersController extends Controller
{
    
    public function index(){

        $users=User::all();
        $onlineusers=User::where('online', true)->get();

        return view ('user.userslist')->with(['users' => $users, 'onlineusers' => $onlineusers]);
    }
    
    public function showMyProfile(){

        $users=User::where('online', true)->get();
        
        return view ('user.myprofile')->with('users', $users);

    }

    public function showProfileWithId (User $profileuser){

        $users=User::where('online', true)->get();
        return view ('user.showprofilewithid')->with(['users' => $users, 'profileuser' => $profileuser]);
    }

    public function inbox(){

        $users=User::where('online', true)->get();
        $inboxmessages = PrivateMessage::where('recipientId', Auth()->user()->id)->get();
        $unreadPrivateMessages = Auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewPrivateMessage');

        
       // dd($privatemessage->name);

       
        return view ('user.inbox')->with(['users'=> $users, 'inboxmessages' => $inboxmessages, 'unreadPrivateMessages' => $unreadPrivateMessages ]);
    }

    public function outbox(){
        $users=User::where('online', true)->get();
        $inboxmessages = PrivateMessage::where('user_id', Auth()->user()->id)->get();
        return view ('user.outbox')->with(['users'=> $users, 'inboxmessages' => $inboxmessages ]);

    }

    public function sendPrivateMessage(User $profileuser){

        
        $users=User::where('online', true)->get();
        return view ('user.sendprivatemessage')->with(['users' => $users, 'profileuser' => $profileuser]);
    }

    public function storePrivateMessage(Request $request){

       

        $request->validate([
            'subject' => '|required|string|max:80',
            'message' => 'required|string|max:500'
        ]);

        $subject=Subject::create([
            'name' =>$request->subject
        ]);

        $privateMessage=PrivateMessage::create([
                'subject_id' => $subject->id,
                'user_id' => Auth()->user()->id,
                'message' => $request->message,
                'recipientId'=>$request->recipientId


        ]);


        $user = User::find($request->recipientId);

        session()->flash('message', 'Private message has been successfully submitted');

        Notification::send($user, new NewPrivateMessage($privateMessage->id));

        //return redirect()->action('UsersController@sendPrivateMessage', ['profileuser' => $request->recipientId]);
        return back();

    }


    public function showMessage(PrivateMessage $privatemessage){
        $samesubject=PrivateMessage::where('subject_id', $privatemessage->subject_id)->get();
        $users=User::where('online', true)->get();

        

        return view ('user.inboxmessage')->with(['users' => $users, 'samesubject' => $samesubject, 'privatemessage' => $privatemessage]);

    }

    public function markInboxMessageAsRead(Request $request){

        $notification = DB::table('notifications')->where('id', $request->notificationId);
        $notification->delete();
        
    }

    public function privateMessageReply(Request $request){

        $request->validate([
           
            'message' => 'required|string|max:500'
        ]);

        $privateMessage=PrivateMessage::create([
                'subject_id' => $request->subject_id,
                'user_id' => Auth()->user()->id,
                'message' => $request->message,
                'recipientId'=>$request->recipientId


        ]);

        
        return redirect()->back();
    }


    public function uploadProfilePhoto (Request $request){

            $request->validate([

                'img' => 'required | file | image |max: 4999'

            ]);

            File::delete(public_path('storage/' . Auth()->user()->img));


            $imageName = $request->img->getClientOriginalName();
            $user = Auth()->user();

            $user->update([

                'img'=>$imageName
            ]);
            $request->img->storeAs('public', $imageName);
    }

    public function edit (User $user){

                return view ('user.edituser')->with('user', $user);

    }

    public function update (User $user, Request $request){


        
        $request->validate([
           
            'name' => 'required | string|max:255',
            'email' => 'unique:users,email,'.$user->id,
            'surname' => 'required| string| max:255',
            'town' => 'required| string|  max:255',
            'address' => 'required| string| min:8',
            'department' => 'required| string| max:255',
            'workplace' => 'required_if:department,Technician on terrain| string| min:5 |max:255',
        ]);

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->town = $request->town;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->department = $request->department;
        $user->workplace = $request->workplace;
        $user->save();

        return redirect('/users/profile/'.$user->id)->with('userInfoUpdated', 'userInfoUpdated');

    }
}
