<?php

namespace App;

use App\Permissions\HasPermissionsTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * App\User
 *
 * @property int $id
 * @property string $first_name
 * @property string $second_name
 * @property string $user_name
 * @property string $hashed_password
 * @property string $profile_picture
 * @property string $cover_picture
 * @property int|null $from
 * @property int|null $lives
 * @property string|null $study
 * @property string|null $work
 * @property int $gender
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $Followers
 * @property-read int|null $followers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|User[] $Followings
 * @property-read int|null $followings_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Track[] $Tracks
 * @property-read int|null $tracks_count
 * @property-read mixed $password
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \App\Playlist|null $playlist
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCoverPicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHashedPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLives($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSecondName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStudy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereWork($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;
    use HasPermissionsTrait; //Import The Trait

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
        return $this->belongsToMany(User::class,'friends','following_user_id','follower_user_id')->orderByDesc('created_at');
//        return $this->hasMany(Friends::class,'following_user_id')->orderByDesc('created_at');
    }

    public function Followings(){//return followings
        return $this->belongsToMany(User::class,'friends','follower_user_id','following_user_id')->orderByDesc('created_at');
//        return $this->hasMany(Friends::class,'follower_user_id')->orderByDesc('created_at');
    }

    public function getPasswordAttribute()
    {
        return $this->hashed_password;
    }
    public function chats(){
        return Chat::where('from_user_id',$this->id)->orWhere('to_user_id',$this->id)->orderBy('updated_at','DESC')->get();
    }

    public function playlist(){
        return $this->hasOne(Playlist::class,'user_id','id');
    }

    public function friends(){
        return $this->friendsOfMine->merge($this->friendsOf);
    }
}
