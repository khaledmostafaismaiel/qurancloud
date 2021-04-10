<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\trackLoves
 *
 * @property int $id
 * @property int $track_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|trackLoves newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|trackLoves newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|trackLoves query()
 * @method static \Illuminate\Database\Eloquent\Builder|trackLoves whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|trackLoves whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|trackLoves whereTrackId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|trackLoves whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|trackLoves whereUserId($value)
 * @mixin \Eloquent
 */
class trackLoves extends Model
{
    protected $fillable = [
        'id',
        'track_id',
        'user_id',
        'created_at',
        'updated_at'
    ];
}
