<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Exception;
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
        try {
            $facebookUser = Socialite::driver('facebook')->user();
            $findUser = User::where('fb_id', $facebookUser->id)->firs();

            if ($findUser) {
                Auth::login($findUser);
                return redirect()->intended('/dashboard');
            } else {
                $newUser = User::create([
                    'name'     => $facebookUser->name,
                    'email'    => $facebookUser->email,
                    'fb_id'    => $facebookUser->id,
                    'password' => encrypt('12345678'),
                ]);
                Auth::login($newUser);
                return redirect()->intended('/dashboard');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }


    public function loginGoogle()
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
                'profile_photo_path' => $user->getAvatar,
                'external_id'        => $user->id,
                'genero'             => $user->genero,
                'external_auth'      => 'google',
            ]);

            Auth::login($userNew);

            return redirect('/dashboard');
        }
    }
}
