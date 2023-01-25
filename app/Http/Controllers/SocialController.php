<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
  

    public function redirectFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFacebook()
    {
        $user = Socialite::driver('facebook')->user();

        $avatarProfile = $user->avatar_original . "&access_token={$user->token}";

        $userExists = User::where('external_id', $user->id)->where('external_auth', 'facebook')->first();
        
        if ($userExists) {
            Auth::login($userExists);
            return redirect('/dashboard');
        } else {

            $userNew = User::create([
                'external_id'        => $user->id,
                'name'               => $user->name,
                'email'              => $user->email,
                'avatar'             => $avatarProfile,
                'gender'             => $user->user_gender,
                'password'           => bcrypt($user->email),
                'email_verified_at'  => now(),
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
                'gender'             => $user->gender,
                'password'           => bcrypt($user->email),
                'email_verified_at'  => now(),
                'external_auth'      => 'google',
                // 'token'              => $user->token,
            ]);

            Auth::login($userNew);

            return redirect('/dashboard');
        }
    }

    



}
