<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Track
 *
 * @property int $id
 * @property int $user_id
 * @property string $file_name
 * @property string|null $caption
 * @property string $temp_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $Comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\trackLoves[] $trackLoves
 * @property-read int|null $track_loves_count
 * @method static \Illuminate\Database\Eloquent\Builder|Track newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Track newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Track query()
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereCaption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereTempName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Track whereUserId($value)
 * @mixin \Eloquent
 */
class Track extends Model
{

    protected $fillable = [
        'id',
        'user_id',
        'file_name',
        'caption',
        'temp_name',
        'created_at',
        'updated_at'
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
