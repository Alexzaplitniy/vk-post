<?php

namespace App\Models;

use App\Traits\Orderable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserProfile
 *
 * @property int $id
 * @property string $user_id
 * @property string $vk_name
 * @property string $instagram_name
 * @property string $avatar
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserProfile whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserProfile whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserProfile whereVkName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserProfile whereInstagramName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserProfile whereAvatar($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserProfile whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserProfile latestFirst()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserProfile oldestFirst()
 */
class UserProfile extends Model
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
}