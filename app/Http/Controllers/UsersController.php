<?php

namespace App\Http\Controllers;

use App\User;
use App\Subject;
use App\PrivateMessage;
use Illuminate\Http\Request;

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

        
       // dd($privatemessage->name);

       
        return view ('user.inbox')->with(['users'=> $users, 'inboxmessages' => $inboxmessages ]);
    }

    public function outbox(){
        $users=User::where('online', true)->get();
        return view ('user.outbox')->with('users', $users);

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

        session()->flash('message', 'Private message has been successfully submitted');

        return redirect()->action('UsersController@sendPrivateMessage', ['profileuser' => $request->recipientId]);
        

    }


    public function showMessage(PrivateMessage $privatemessage){
        $samesubject=PrivateMessage::where('subject_id', $privatemessage->subject_id)->get();
        $users=User::where('online', true)->get();

        

        return view ('user.inboxmessage')->with(['users' => $users, 'samesubject' => $samesubject, 'privatemessage' => $privatemessage]);

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

        session()->flash('message', 'Private message has been successfully submitted');
    }
}
