<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'surname', 'town', 'address', 'department','workplace','img'
    ];

   /* protected $attributes = [
        'online' => false,
     ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tasks(){

        return  $this->hasMany(Task::class);
     }

     public function privatemessages(){

        return $this->hasMany(PrivateMessage::class);
     }

     public function chats()
     {
         return $this->belongsToMany(Chat::class);
     }

     public function comments(){

        return  $this->hasMany(Comment::class);
     }
}
