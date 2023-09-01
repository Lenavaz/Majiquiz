<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUsername
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // se utilizador estiver autenticado mas o seu username nao for 'admin', redirecionar para a route home
        if ($request->user() && $request->user()['username'] !== 'admin') {
            return redirect(route('home'));
        }

        return $next($request);
    }
}
