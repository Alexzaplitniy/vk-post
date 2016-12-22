<?php
namespace App\Transformers;

use App\Models\User;
use App\Models\UserProfile;
use League\Fractal\TransformerAbstract;

/**
 * Class UserProfileTransformer
 * @package App\Transformers
 */
class UserProfileTransformer extends TransformerAbstract
{
    public function transform(UserProfile $profile)
    {
        return [
            'avatar' => $profile->avatar,
            'vk_name' => $profile->vk_name,
            'instagram_name' => $profile->instagram_name,
            'created_at' => $profile->created_at->toDateTimeString(),
            'created_at_human' => $profile->created_at->diffForHumans(),
            'updated_at' => $profile->updated_at->toDateTimeString(),
            'updated_at_human' => $profile->updated_at->diffForHumans()
        ];
    }
}
