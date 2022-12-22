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
        try{
            $facebookUser = Socialite::driver('facebook')->user();
            $findUser = User::where('fb_id', $facebookUser->id)->firs();

            if($findUser)
            {
                Auth::login($findUser);
                return redirect()->intended('dashboard');
            }
            else
            {
                $newUser = User::create([
                    'name'     => $facebookUser->name,
                    'email'    => $facebookUser->email,
                    // 'genero'   => $facebookUser->genero,
                    'fb_id'    => $facebookUser->id,
                    'password' => encrypt('12345678'),
                ]);
                Auth::login($newUser);
                return redirect()->intended('dashboard');
            }

        }catch(Exception $e){
            dd($e->getMessage());
        }
    }


}
