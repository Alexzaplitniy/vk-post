<?php

namespace App\Models;

use App\Traits\Orderable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\models\Attach
 *
 * @property int $id
 * @property string $name
 * @property string $path
 * @property int $width
 * @property int $height
 * @property int $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\models\Attach whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\models\Attach whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\models\Attach wherePath($value)
 * @method static \Illuminate\Database\Query\Builder|\App\models\Attach whereWidth($value)
 * @method static \Illuminate\Database\Query\Builder|\App\models\Attach whereHeight($value)
 * @method static \Illuminate\Database\Query\Builder|\App\models\Attach whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\models\Attach whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\models\Attach whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $ref_id
 * @method static \Illuminate\Database\Query\Builder|\App\models\Attach whereRefId($value)
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Attach latestFirst()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Attach oldestFirst()
 */
class Attach extends Model
{
    use Orderable;

    protected $fillable = ['name', 'path'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
