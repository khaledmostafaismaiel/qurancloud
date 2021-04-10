<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Friends
 *
 * @property int $id
 * @property int $follower_user_id
 * @property int $following_user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Friends newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Friends newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Friends query()
 * @method static \Illuminate\Database\Eloquent\Builder|Friends whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friends whereFollowerUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friends whereFollowingUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friends whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Friends whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Friends extends Model
{
    protected $fillable = [
        'id',
        'follower_user_id',
        'following_user_id',
        'created_at',
        'updated_at'
    ];
}
