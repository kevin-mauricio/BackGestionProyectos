<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistroRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(RegistroRequest $request) {

        $datos = $request->validated();

        $datos['password'] = Hash::make($datos['password']);
        $usuario = User::create($datos);

        $token = $usuario->createToken('auth_token')->plainTextToken;
        return response()->json(['token' => $token],200);
    }

    public function login(LoginRequest $request) {

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Las credenciales son incorrectas.'],
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['token' => $token],200);
    }

    public function logout(Request $request){
        if (!$request->bearerToken()) {
            return response()->json(['message' => 'Falta el token de autenticación.'], 401);
        }

        if (!$request->user()) {
            return response()->json(['message' => 'Token inválido o usuario no autenticado.'], 401);
        }

        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Sesión cerrada con éxito.'], 200);
    }
}
