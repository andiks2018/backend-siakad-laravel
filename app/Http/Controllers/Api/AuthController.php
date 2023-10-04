<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login (Request $request)
    {
        $request->validate([
            'email'=>'required|string|email',
            'password'=>'required'
        ]);

        //check email
        $user= User::where('email', $request->email)->first();

        //check password
        if(!$user){
            throw ValidationException::withMessages([
                'email'=>['email incorrect']
            ]);
        }

        if(!Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'email'=>['password incorrect']
            ]);
        }

        $token = $user->createToken('api-token')->plainTextToken;
        return response()->json(
            [
                'jwt-token'=>$token,
                'user'=> $user,
            ]
        );
    }
}
