<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{

    protected $fillable=['name'];
    protected $attributes = [
        'name' => 'private_chat',
     ];


    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
