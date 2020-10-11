<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateOnceWithBasicAuth
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request request
     * @param Closure $next    closure
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return Auth::onceBasic('name') ?: $next($request);
    }
}
