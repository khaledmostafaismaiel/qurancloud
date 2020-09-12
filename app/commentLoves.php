<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class commentLoves extends Model
{
    protected $fillable = [
        'id',
        'comment_id',
        'user_id',
        'created_at',
        'updated_at'
    ];
}
