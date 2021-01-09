<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'first_name',
        'second_name',
        'user_name',
        'hashed_password',
        'cover_photo',
        'profile_picture',
        'gender',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'hashed_password'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
//        'email_verified_at' => 'datetime',
    ];

    public function full_name(){

        if((isset($this->first_name)) && (isset($this->second_name)) ){

            return $this->first_name." ".$this->second_name ;
        }else{
            return "" ;
        }
    }

    public function Tracks(){//return tracks which belongs to that user
        return $this->hasMany(Track::class,'user_id')->orderByDesc('created_at');
    }

    public function Followers(){//return followers
        return $this->hasMany(Friends::class,'following_user_id')->orderByDesc('created_at');
    }

    public function Followings(){//return followings
        return $this->hasMany(Friends::class,'follower_user_id')->orderByDesc('created_at');
    }

    public function getPasswordAttribute()
    {
        return $this->hashed_password;
    }
    public function chats(){
        return $this->hasMany(Chat::class);
    }

    public function playlist(){
        return $this->hasOne(Playlist::class,'user_id','id');
    }
}
