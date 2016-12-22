<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Orderable;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property string $when_public
 * @property int $user_id
 * @property int $ref_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\models\Attach[] $attaches
 * @method static \Illuminate\Database\Query\Builder|\App\models\Post whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\models\Post whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\models\Post whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\models\Post whereWhenPublic($value)
 * @method static \Illuminate\Database\Query\Builder|\App\models\Post whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\models\Post whereAttachId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\models\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\models\Post whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post latestFirst()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Post oldestFirst()
 */
class Post extends Model
{
    use Orderable;

    protected $fillable = ['title', 'body', 'file'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attaches()
    {
        return $this->hasMany(Attach::class, 'ref_id', 'id');
    }
}
