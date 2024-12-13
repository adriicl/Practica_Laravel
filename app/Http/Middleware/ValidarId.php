<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidarId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->route('id');

        // Verificar si el ID es numérico, entero y positivo
        if (!is_numeric($id) || intval($id) <= 0) {
            return response()->json(['error' => 'El ID es incorrecto.'], 400);
        }

        return $next($request);
    }
}
