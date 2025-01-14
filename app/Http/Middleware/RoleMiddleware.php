<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class RoleMiddleware
{

    public function handle(Request $request, Closure $next, $role): Response
    {
        if (Auth::user()->role != $role) return response('Sin autorización', 401);
        return $next($request);
    }
}
