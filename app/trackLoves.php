<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class trackLoves extends Model
{
    protected $fillable = [
        'id',
        'track_id',
        'user_id',
        'created_at',
        'updated_at',
    ];
}
