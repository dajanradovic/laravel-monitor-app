<?php

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

use App\Events\SendChatMessageEvent;







Route::get('/', function () {
    return view('welcome');
});
Route::post('tasks/updateTaskStatus', 'TasksController@updateTaskStatus')->name('proba');



Route::get ('chatroom', 'ChatController@sendMessage')->name('chatroom');
Route::post ('chatroom', 'ChatController@send');


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