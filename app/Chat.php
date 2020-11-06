<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    protected $fillable = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function messages(){
        return $this->hasMany(Message::class,'chat_id');
    }
    public function lastMessage(){
        return $this->messages()->first();
    }
}
