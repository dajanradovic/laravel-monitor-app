<?php
namespace App;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Chat;
use App\User;
use App\Events\SendChatMessageEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;







Route::get('/', function () {
    return view('welcome');
});
Route::post('tasks/updateTaskStatus', 'TasksController@updateTaskStatus')->name('proba');



Route::get ('chatroom', 'ChatController@sendMessage')->name('chatroom');
Route::get ('chatroomfinal/{chat}', 'ChatController@openChatRoom');
Route::get ('chatroomdecline', 'ChatController@declineInvitation');
Route::get ('chatroomaccept', 'ChatController@acceptInvitation');


Route::post ('chatroom', 'ChatController@send');

Route::get('test', function(){
/*
  $last_activity = \DB::table('sessions')->select('last_activity', 'user_id')->where('user_id','!=', null)->get();
dd($last_activity);

foreach($last_activity as $activity){

    $last=$activity->last_activity;
    
    if (session_time_remaining($last)<0){

        User::where('id', $activity->user_id)->update(['online' => 0]);
       // $user = new User;
      //  $user->find($activity->user_id);
      //  $user->online=0;
      //  $user->save();
    }


}
//$session_time_remaining_minutes = ($last_activity + (\Config::get('session.lifetime') * 60) - time()) / 60;

//dd($session_time_remaining_minutes);*/

$chat=new Chat();
        $chat->name="private_chat";
        $chat->save();
        User::find(Auth()->user()->id)->chats()->sync($chat);
        

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('tasks', 'TasksController');

Route::get('/mail', 'MailController@send');

Route::get('dashboard/supervisor/new', 'SupervisorController@newTasks')->name('supervisor/addedtasks');

Route::get('/users/profile', 'UsersController@showMyProfile');
Route::get('/users/profile/inbox/{privatemessage}', 'UsersController@showMessage');
Route::post('/users/profile/inbox/reply', 'UsersController@privateMessageReply');

Route::get('/users/profile/inbox', 'UsersController@inbox');
Route::get('/users/profile/outbox', 'UsersController@outbox');

Route::get('/users/profile/{profileuser}/privatemessage', 'UsersController@sendPrivateMessage');
Route::post('/users/profile/privatemessage', 'UsersController@storePrivateMessage');

Route::get('/users/profile/{profileuser}', 'UsersController@showProfileWithId');

Route::get('/users', 'UsersController@index');



function session_time_remaining($last){

$session_time_remaining_minutes = ($last + (\Config::get('session.lifetime') * 60) - time()) / 60;

return $session_time_remaining_minutes;

}