<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Notifications\ChatInvite;

use App\Notifications\ChatDecline;
use Illuminate\Support\Facades\Log;
use App\Events\SendChatMessageEvent;
use Illuminate\Support\Facades\Notification;

class ChatController extends Controller
{
    public function sendMessage(Request $request){

       

        
        Notification::send(User::find($request->invitedUserId), new ChatInvite());

        
    }

    public function send(Request $request){

        event(new SendChatMessageEvent($request->all(), Auth()->user()->name));
    }

    public function openChatRoom (){

        return view ('chatroom');
    }

    public function declineInvitation(Request $request){

        Notification::send(User::find($request->declinedUserId), new ChatDecline());
    }
}
