<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'created_at',
        'updated_at'
    ];

    public function playlistTracks(){
        return $this->hasMany(PlaylistTracks::class,'playlist_id','id');
    }
}
