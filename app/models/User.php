<?php

namespace App\models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

/**
 * App\User
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
 */
class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

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
}
