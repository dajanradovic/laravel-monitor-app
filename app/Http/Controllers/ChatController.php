<?php

namespace App\Http\Controllers;

use App\Chat;
use App\User;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Notifications\ChatAccept;
use App\Notifications\ChatInvite;
use App\Notifications\ChatDecline;
use Illuminate\Support\Facades\Log;
use App\Events\SendChatMessageEvent;
use Illuminate\Support\Facades\Notification;

class ChatController extends Controller
{

    

    public function sendMessage(Request $request){

       
        $chat=new Chat();
        $chat->name="private_chat";
        $chat->save();
        User::find(Auth()->user()->id)->chats()->attach($chat);
        User::find($request->invitedUserId)->chats()->attach($chat);


        //User::find(Auth()->user()->id)->chats()->attach($chat->id);
        
        Notification::send(User::find($request->invitedUserId), new ChatInvite($chat->id));

       

        
    }

    public function send(Request $request){

        event(new SendChatMessageEvent($request->all(), Auth()->user()->name));
    }

    public function openChatRoom (Chat $chat){

        $chatID = Chat::find($chat)->first();
        //dd($chatID->id);
        //dd($chatID->withPivot());
        $chatUsers=$chat->users;
      
        foreach (Auth()->user()->chats as $chat){

            //dd($chat);


            if ($chat->id == $chatID->id){
                
                return view ('chatroom')->with(['chatUsers' => $chatUsers]);
            }

        } ;
        
    }

    public function declineInvitation(Request $request){

        Notification::send(User::find($request->declinedUserId), new ChatDecline());
    }

    public function acceptInvitation(Request $request){
        
        Notification::send(User::find($request->acceptId), new ChatAccept($request->chatId));
    }
}
