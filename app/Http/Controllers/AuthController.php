<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $validators = Validator::make($request->all(), [
            'email' => ['required', 'email', 'exists:utilisateurs,email'],
            'password' => 'required',
        ]);

        if ($validators->fails()) {
            return response()->json($validators->errors(), 422);
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $token = $request->user()->createToken('mon_appli');
            $user = $request->user();
            return response()->json(['token' => $token->plainTextToken, 'user' => $user]);

        }


        if (!Auth::attempt($request->only('email', 'password'))) {
            
            return response()->json("Les identifiants de connexion sont invalides !", 403);
        }

       
    }
}
