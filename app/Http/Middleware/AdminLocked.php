<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminLocked
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/Ingreso')->with('error', 'Debes iniciar sesión para acceder a esta página');
        }

        $user = Auth::user();

        if ($user->role==='cliente') {
            // Si el usuario no es administrador, puedes redirigirlo a una página de acceso denegado
            // o cualquier otra página que desees.
            return redirect('/')->with('error', 'No tienes permiso para acceder a esta página');
        }

        return $next($request);
    }
}
