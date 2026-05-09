<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAccountIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifie si l'utilisateur a un compte actif (on suppose que is_active est true si la colonne n'existe pas ou qu'on n'a pas encore fait la migration)
        if (auth()->check() && isset(auth()->user()->is_active) && !auth()->user()->is_active) {
            return redirect('/')->with('error', 'Votre compte est desactive.');
        }
        
        return $next($request);
    }
}
