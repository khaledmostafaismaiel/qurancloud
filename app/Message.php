<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'id',
        'chat_id',
        'from_user_id',
        'to_user_id',
        'body',
        'created_at',
        'updated_at'
    ];

}
