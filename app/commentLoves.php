<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\commentLoves
 *
 * @property int $id
 * @property int $comment_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|commentLoves newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|commentLoves newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|commentLoves query()
 * @method static \Illuminate\Database\Eloquent\Builder|commentLoves whereCommentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|commentLoves whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|commentLoves whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|commentLoves whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|commentLoves whereUserId($value)
 * @mixin \Eloquent
 */
class commentLoves extends Model
{
    protected $fillable = [
        'id',
        'comment_id',
        'user_id',
        'created_at',
        'updated_at'
    ];
}
