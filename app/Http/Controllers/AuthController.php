<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function registro(Request $request){
        $usuario = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $token = $usuario->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['data' => $usuario, 'acces_token' => $token, 'token_type' => 'Bearer',]);
    }
    public function login(Request $request){
        if (!Auth::attempt($request->only('email', 'password'))){
            return response()
            ->json(['message' => 'No esta autorizado'], 401);
        }
        $usuario = User::where('email', $request['email'])->firstOrFail();
        $token = $usuario->createToken('auth_token')->plainTextToken;
        return response()
            ->json([
                'message' => 'Hola'.$usuario->name,
                'accessToken' => $token,
                'token_type' => 'Bearer',
                'user' => $usuario]);
    }
    public function logout(){
        auth()->user()->tokens()->delete();
        return ['message' => 'ha cerrado sesión correctamente y el token se eliminó con éxito'];
    }
}
