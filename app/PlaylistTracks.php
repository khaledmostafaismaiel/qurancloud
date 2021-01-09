<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaylistTracks extends Model
{
    protected $fillable = [
        'id',
        'playlist_id',
        'track_id',
        'created_at',
        'updated_at'
    ];
}
