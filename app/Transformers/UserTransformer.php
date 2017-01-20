<?php
namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

/**
 * Class UserTransformer
 * @package App\Transformers
 */
class UserTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['userProfile', 'post'];

    public function transform(User $user)
    {
        return [
            'avatar' => $user->avatar(),
            'username' => $user->username,
            'email' => $user->email,
            'created_at' => $user->created_at->toDateTimeString(),
            'created_at_human' => $user->created_at->diffForHumans(),
            'updated_at' => $user->updated_at->toDateTimeString(),
            'updated_at_human' => $user->updated_at->diffForHumans(),
            'instargam_login' => $user->instargam_login,
            'instargam_password' => $user->instargam_password ? true : false,
            'vk_token' => $user->vk_token ? true : false,
        ];
    }

    public function includeUserProfile(User $user) {
    	return $this->item($user->profile, new UserProfileTransformer);
    }

    public function includePost(User $user) {
    	return $this->collection($user->posts, new PostTransformer);
    }
}
