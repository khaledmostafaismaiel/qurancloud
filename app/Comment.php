<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'id',
        'track_id',
        'user_id',
        'comment',
        'created_at',
        'updated_at'
    ];

    public function commentLoves(){//return loves which belongs to that comment
        return $this->hasMany(commentLoves::class,'comment_id')->orderByDesc('created_at');
    }

    public function user(){//return user which belongs to that comment
        return $this->belongsTo(User::class,'user_id');
    }
}
