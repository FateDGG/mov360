<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAuthenticated
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/Ingreso')->with('error', 'Debes iniciar sesión para acceder a esta página');
        }

        return $next($request);
    }

}
