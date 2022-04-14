<?php

namespace App\Services;

use \App\Contracts\Social;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Fortify;
use Laravel\Socialite\Contracts\User as SocialContract;

class SocialService implements Social
{

    public function authUser(SocialContract $socialUser): string
    {

        $user = User::where('email', $socialUser->getEmail())->first();

        if($user) {

            if ($this->updateUser($user, $socialUser) && \Auth::user()->is_admin){
                return route('admin.dashboard');
            }

            return route('home');

        }


        if ($user = $this->createUser($socialUser)){
            \Auth::loginUsingId($user->id);
            return route('home');
        }

        return route('register');

    }


    private function updateUser(User $user, SocialContract $socialUser): bool|user
    {
        $user->name = (($socialUser->getName()) ?? $socialUser->getNickname());
        $user->avatar = $socialUser->getAvatar();

        if($user->save()) {
            \Auth::loginUsingId($user->id);
            return true;
        }
        return false;

    }

    private function createUser(SocialContract $socialUser): bool|user
    {
        $user = User::create([
            'name' => (($socialUser->getName()) ? $socialUser->getName() : $socialUser->getNickname()),
            'email' => $socialUser->getEmail(),
            'avatar' => $socialUser->getAvatar(),
            'password' => Hash::make($socialUser->token),
        ]);

        if ($user)
            return $user;

        return false;

    }


}
