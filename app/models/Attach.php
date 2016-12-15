<?php

namespace App\models;

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
 */
class Attach extends Model
{
    //
}
