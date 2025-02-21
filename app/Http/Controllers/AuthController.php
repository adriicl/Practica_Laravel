<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');

        if ($request->user()) {
            return response()->json(['message' => 'Ya estás autenticado.'], 200);
        }

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Credenciales incorrectas.'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Autenticación exitosa.',
            'user' => $user->name,
            'token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Sesión cerrada correctamente.']);
    }

    public function getUser(Request $request)
    {
        return response()->json(['user' => $request->user()]);
    }

    public function rutaPublica()
    {
        return response()->json(['message' => 'Ruta pública accesible sin autenticación']);
    }
}
