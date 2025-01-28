<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            // Regenerar sesión solo si está habilitada
            if ($request->hasSession()) {
                $request->session()->regenerate();
            }

            return response()->json(['message' => 'Autenticación exitosa.']);
        }

        return response()->json(['message' => 'Credenciales incorrectas.'], 401);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        if ($request->hasSession()) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return response()->json(['message' => 'Sesión cerrada correctamente.']);
    }

    public function getUser(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'No está autenticado.'], 401);
        }

        return response()->json(['user' => Auth::user()]);
    }
}
