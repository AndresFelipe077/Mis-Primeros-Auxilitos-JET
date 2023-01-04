<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthControllerApi extends Controller
{
    
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'            => 'required|string|max:255',
            'email'           => 'required|string|email|max:255|unique:users',
            'genero'          => 'required',
            'fechaNacimiento' => 'required',
            'password'        => 'required|string|min:8',
        ]);


        if($validator->fails())
        {
            return response()->json($validator->errors());
        }

        $user =  User::create([
            'name'            => $request -> name,
            'email'           => $request -> email,
            'genero'          => $request -> genero,
            'fechaNacimiento' => $request -> fechaNacimiento,
            'password'        => Hash::make($request->password),
            ]);

        $token = $user->createToken('auth_token')->plainTextToken;


        return response()->
        json(['data' => $user, 'access_token' => $token, 'token_type' => 'Bearer', ]);

    }


    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()
            ->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
        ->json([
            'message'      => 'Hi! ' . $user->name,
            'access_token' => $token,
            'token_type'   => 'Bearer',
            'user'         => $user,
        ]);
    }

    
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'Logout exitoso!!!'
        ];
    }


    public function delete(Request $request)
    {
        auth()->user()->tokens()->delete();
        $request->user()->deleteProfilePhoto();
        auth()->user()->tokens->each->delete();
        $request->user()->delete();
        return [
            'message' => 'delete exitoso!!!'
        ];
    }

}
