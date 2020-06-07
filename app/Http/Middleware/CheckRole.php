<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    public function handle($request, Closure $next)
    {
        $msg = '<div style="text-align:center;margin-top:100px"><h3>Vous n\'avez pas l\'autorisation d\'accéder à cette page!!</h3><br><a href="'.url('/dashboard').'">Accueil</a></div>';
        if ($request->user()===null) {
            return response($msg,401);
        }
        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null;
        if ( $request->user()->hasAccess(1) || !$roles ) {
            return $next($request);
        }
        return response($msg,401);
    }
}
