<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    protected $fillable = [
        'id',
        'follower_user_id',
        'following_user_id',
        'created_at',
        'updated_at',
    ];
}
