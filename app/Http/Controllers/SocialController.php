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

        $userExists = User::where('external_id', $user->id)->where('external_auth', 'facebook')->first();
        if ($userExists) {
            Auth::login($userExists);
            return redirect('/dashboard');
        } else {
            $userNew = User::create([
                'password'           => $user->password,
                'name'               => $user->name,
                'email'              => $user->email,
                'profile_photo_path' => $user->avatar,
                'external_id'        => $user->id,
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
                'password'           => encrypt(''),
                'name'               => $user->name,
                'email'              => $user->email,
                'profile_photo_path' => $user->avatar,
                'external_id'        => $user->id,
                'genero'             => $user->genero,
                'external_auth'      => 'google',
            ]);

            Auth::login($userNew);

            return redirect('/dashboard');
        }
    }
}
