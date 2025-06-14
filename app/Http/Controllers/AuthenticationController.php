<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    /**
     * Enregistre un nouvel utilisateur et retourne un token.
     */
    public function register(Request $request)
    {
        $user = User::create([
            'username'     => $request['name'],
            'email'        => $request['email'],
            'password'     => bcrypt($request['password']),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type'   => 'Bearer',
        ]);
    }

    /**
     * Connecte un utilisateur et retourne un token.
     */
    public function login(Request $request)
    {
        $user = User::first();
//        $request->validate([
//            'email'    => 'required|email',
//            'password' => 'required',
//        ]);
//
//        $user = User::where('email', $request->email)->first();
//
//        if (!$user || !Hash::check($request->password, $user->password)) {
//            return response()->json([
//                'message' => 'Identifiants invalides',
//            ], 401);
//        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type'   => 'Bearer',
        ]);
    }

    /**
     * Déconnecte l'utilisateur (révoque le token).
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Déconnecté avec succès',
        ]);
    }

    /**
     * Récupère les infos de l'utilisateur connecté.
     */
    public function me(Request $request)
    {
        return response()->json($request->user());
    }
}
