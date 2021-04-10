<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PlaylistTracks
 *
 * @property int $id
 * @property int $playlist_id
 * @property int $track_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PlaylistTracks newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlaylistTracks newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlaylistTracks query()
 * @method static \Illuminate\Database\Eloquent\Builder|PlaylistTracks whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlaylistTracks whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlaylistTracks wherePlaylistId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlaylistTracks whereTrackId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlaylistTracks whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
