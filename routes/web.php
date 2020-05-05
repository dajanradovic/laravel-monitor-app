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
use Illuminate\Support\Facades\Config;







Route::get('/', function () {
    return view('welcome');
});

Route::get('tasks/markAsRead', 'TasksController@markAsRead');
Route::get('tasks/updateTaskStatus', 'TasksController@updateTaskStatus')->name('proba');
Route::post('tasks/createComment', 'TasksController@createComment' )->name('submitcomment');



Route::get ('chatroom', 'ChatController@sendMessage')->name('chatroom');
Route::get ('chatroomfinal/{chat}', 'ChatController@openChatRoom');
Route::get ('chatroomdecline', 'ChatController@declineInvitation');
Route::get ('chatroomaccept', 'ChatController@acceptInvitation');


Route::post ('chatroom', 'ChatController@send');

Route::get('test', function(){
    dd(auth()->user()->notifications->where('type', 'App\Notifications\NewPrivateMessage')->count());
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('tasks', 'TasksController');

Route::get('/mail', 'MailController@send');

Route::get('dashboard/supervisor/new', 'SupervisorController@newTasks')->name('supervisor/addedtasks');
Route::get('markMessageAsRead', 'SupervisorController@markMessageAsRead');

Route::get('/users/profile', 'UsersController@showMyProfile');
Route::get('/users/profile/inbox/{privatemessage}', 'UsersController@showMessage');
Route::post('/users/profile/inbox/reply', 'UsersController@privateMessageReply');
Route::post ('/users/uploadProfilePhoto', 'UsersController@uploadProfilePhoto');
Route::get('/users/{user}/edit', 'UsersController@edit');
Route::put('/users/{user}', 'UsersController@update');


Route::get('/users/profile/inbox', 'UsersController@inbox');
Route::get('/users/profile/outbox', 'UsersController@outbox');

Route::get('/users/profile/{profileuser}/privatemessage', 'UsersController@sendPrivateMessage');
Route::post('/users/profile/privatemessage', 'UsersController@storePrivateMessage');

Route::get('/users/profile/{profileuser}', 'UsersController@showProfileWithId');

Route::get('/users', 'UsersController@index');



