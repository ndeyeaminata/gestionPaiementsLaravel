<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

        $utilisateur = Utilisateur::where([['email', $request->email],['role_id', 1]])->first();

        if($utilisateur){
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                $token = $request->user()->createToken('mon_appli');
                $user = $request->user();
                $role = Role::find($user->role_id);
                return response()->json([
                    'status' => '200',
                    'token' => $token->plainTextToken,
                    'user' => $user,
                    'role' => $role
                ]);
            }
        }



        if (!Auth::attempt($request->only('email', 'password'))) {

            return response()->json([
                "message"=>"Les identifiants de connexion sont invalides !",
                "status"=> 422
            ]);
        }


    }


    // Déconnexion utilisateur
    public function logout(Request $request)
    {
        $user = Auth::user();
        $user->tokens()->delete();
        return response()->json(['message' => 'Déconnexion réussie']);
    }
}
