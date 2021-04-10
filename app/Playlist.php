<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Playlist
 *
 * @property int $id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PlaylistTracks[] $playlistTracks
 * @property-read int|null $playlist_tracks_count
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist query()
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist whereUserId($value)
 * @mixin \Eloquent
 */
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
