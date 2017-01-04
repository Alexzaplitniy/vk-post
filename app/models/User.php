<?php

namespace App\Models;

use App\Traits\Orderable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

/**
 * App\Models\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $readNotifications
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $unreadNotifications
 * @mixin \Eloquent
 * @property $username
 * @property $email
 * @property $password
 * @property int $id
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @method static \Illuminate\Database\Query\Builder|\App\models\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\models\User whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\App\models\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\models\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\models\User whereUpdatedAt($value)
 * @property string $instargam_login
 * @property string $instargam_password
 * @method static \Illuminate\Database\Query\Builder|\App\models\User whereInstargamLogin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\models\User whereInstargamPassword($value)
 * @property string $vk_token
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User whereVkToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User latestFirst()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\User oldestFirst()
 * @property-read \App\Models\UserProfile $profile
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts
 */
class User extends Authenticatable
{
    use Notifiable, HasApiTokens, Orderable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function avatar()
    {
        return 'https://www.gravatar.com/avatar/' . md5($this->email) . '?s=45&d=mm';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(UserProfile::class, 'user_id', 'id');
    }

    public function posts() {
    	return $this->hasMany(Post::class);
    }
}
