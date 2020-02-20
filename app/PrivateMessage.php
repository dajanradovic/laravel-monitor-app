<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivateMessage extends Model
{
    

    protected $fillable = [
        'user_id', 'subject_id', 'recipientId', 'message'
    ];




    public function user(){

        return $this->belongsTo(User::class);
    }

    public function subject(){

        return $this->belongsTo(Subject::class);
    }
}
