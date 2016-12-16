<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\models\Post
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property string $when_public
 * @property int $user_id
 * @property int $attach_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\models\User $user
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
 */
class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attaches()
    {
        return $this->hasMany(Attach::class);
    }
}
