<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Gérer une requête entrante.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role = null)
    {
        $user = Auth::user();

        // Redirige les utilisateurs authentifiés essayant d'accéder à la page d'accueil
        if ($request->path() === '/' && Auth::check()) {

            $roleRoutes = [
                'agent_domaniale' => 'domaniale.index',
                'agent_cadastrale' => 'cadastrale.index',
                'agent_impots_domaines' => 'impots-domaines.index',
                'agent_hygiene' => 'hygiene.index',
                'agent_urbanisme' => 'urbanisme.index',
                'depositaire' => 'depositaire.index',
                'maire' => 'maire.index',
                'proprietaire' => 'proprietaire.index',
            ];

            $route = $roleRoutes[$user->role->value] ?? '/';
            return redirect()->route($route);
        }

        // Vérifie si l'utilisateur a le rôle requis pour accéder à la route
        if ($role && (!$user || $user->role->value != $role)) {
            return redirect('/');
        }

        return $next($request);
    }
}
