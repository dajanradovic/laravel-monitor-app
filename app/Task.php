<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name', 'email', 'surname', 'town', 'address', 'area','county', 'description', 'phone', 'user_id'
    ];

    protected $attributes = [
        'status' => 'problem submitted',
     ];
 

    public function user (){

        return $this->belongsTo(User::class);
    }
}
