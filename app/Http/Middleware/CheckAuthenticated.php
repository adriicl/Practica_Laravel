<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Laravel\Sanctum\PersonalAccessToken;

class CheckAuthenticated
{
    public function handle(Request $request, Closure $next): Response
    {

        $publicRoutes = ['/login', '/public'];

        if (in_array($request->path(), $publicRoutes)) {
            return $next($request);
        }
        
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json(['message' => 'Token no proporcionado.'], 401);
        }

        $accessToken = PersonalAccessToken::findToken($token);

        if (!$accessToken) {
            return response()->json(['message' => 'Token inválido.'], 401);
        }

        $user = $accessToken->tokenable;

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado.'], 401);
        }

        $request->setUserResolver(fn () => $user);

        return $next($request);
    }
}
