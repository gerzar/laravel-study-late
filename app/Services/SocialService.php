<?php

namespace App\Services;

use \App\Contracts\Social;
use App\Models\User;
use Laravel\Fortify\Fortify;
use Laravel\Socialite\Contracts\User as SocialContract;

class SocialService implements Social
{
    public function authUser(SocialContract $socialUser): string
    {

        $user = User::where('email', $socialUser->getEmail())->first();
        if($user) {
            $user->name = $socialUser->getNickname();
            $user->avatar = $socialUser->getAvatar();

            if($user->save()) {
                \Auth::loginUsingId($user->id);
                return route('home');
            }
        }else {
            //todo: register here
            return route('register');
        }


    }
}
