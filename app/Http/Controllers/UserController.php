<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstagramRequest;
use App\Models\User;
use App\Transformers\UserTransformer;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    public function index(Request $request) {
        return fractal()
            ->item($request->user())
            ->parseIncludes(['userProfile', 'post.attaches', 'post.user.post'])
            ->transformWith(new UserTransformer)
            ->toArray();
    }
    
    public function addInstagram(InstagramRequest $request){

        /** @var User $user */
        $user = $request->user();
        $user->instargam_login = $request->login;
        $user->instargam_password = $request->password;
        $user->save();

        return fractal()
            ->item($user)
            ->parseIncludes(['userProfile'])
            ->transformWith(new UserTransformer)
            ->toArray();
    }
}
