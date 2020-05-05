<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['body', 'user_id', 'task_id'];
    
    public function user (){

        return $this->belongsTo(User::class);
    }

    public function task (){

        return $this->belongsTo(Task::class);
    }

}
