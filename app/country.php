<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\country
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|country query()
 * @method static \Illuminate\Database\Eloquent\Builder|country whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|country whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class country extends Model
{
    protected $fillable = [
        'id',
        'code',
        'name',
        'created_at',
        'updated_at'
    ];
}
