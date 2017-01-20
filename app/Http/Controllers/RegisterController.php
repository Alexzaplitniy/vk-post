<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use App\Transformers\UserTransformer;
use App\Models\User;
use App\Http\Requests\UserRequest;

/**
 * Class RegisterController
 * @package App\Http\Controllers
 */
class RegisterController extends Controller
{
    public function register(UserRequest $request)
    {
        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $this->addProfile($user->id);

        return fractal()
            ->item($user)
            ->transformWith(new UserTransformer())
            ->toArray();
    }

    /**
     * @param int $id
     */
    private function addProfile(int $id)
    {
        $profile = new UserProfile;
        $profile->user_id = $id;
        $profile->save();
    }
}
