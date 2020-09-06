<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{

    protected $fillable = [
        'id',
        'user_id',
        'file_name',
        'caption',
        'temp_name',
        'created_at',
        'updated_at',
    ];

    public function trackLoves(){//return comments which belongs to that track
        return $this->hasMany(trackLoves::class,'track_id')->orderByDesc('created_at');
    }

    public function Comments(){//return comments which belongs to that track
        return $this->hasMany(Comment::class,'track_id')->orderByDesc('created_at');
    }
    public function Last_comment(){//return last comment which belongs to that track
        return $this->Comments()->first();
    }


}
