<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\File;

class SocialController extends Controller
{
    

    public function redirectFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFacebook()
    {
        $user = Socialite::driver('facebook')->user();

        $userExists = User::where('external_id', $user->id)->where('external_auth', 'facebook')->first();
        if ($userExists) {
            Auth::login($userExists);
            return redirect('/dashboard');
        } else {
            $userNew = User::create([
                'external_id'        => $user->id,
                'name'               => $user->name,
                'email'              => $user->email,
                'profile_photo_path' => $user->getAvatar(),
                'password'           => bcrypt($user->email),
                'external_auth'      => 'facebook',
            ]);

            Auth::login($userNew);

            return redirect('/dashboard');
        }
    }


    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function callbackGoogle()
    {
        $user = Socialite::driver('google')->user();

        $userExists = User::where('external_id', $user->id)->where('external_auth', 'google')->first();
        if ($userExists) {
            Auth::login($userExists);
            return redirect('/dashboard');
        } else {
            $userNew = User::create([ //http://mis-primeros-auxilitos-jet.com/google-callback Redireccionamiento Page Google
                'external_id'        => $user->id,
                'name'               => $user->name,
                'email'              => $user->email,
                'avatar'             => $user->getAvatar(),
                'genero'             => $user->genero,
                'password'           => bcrypt($user->email),
                'external_auth'      => 'google',
                'remember_token'       => $user->token,
                // 'github_refresh_token' => $user->refreshToken,
            ]);

            Auth::login($userNew);

            return redirect('/dashboard');
        }
    }

    



}
