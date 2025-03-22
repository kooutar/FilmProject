<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user(); // Récupère l'utilisateur connecté

        // Vérifie si l'utilisateur est connecté et est un administrateur
        if (!$user || $user->role !== 'admin') {
            return response()->json(['error' => 'Accès non autorisé'], 403); // 403 Forbidden
        }

        return $next($request); // 
    }
}
