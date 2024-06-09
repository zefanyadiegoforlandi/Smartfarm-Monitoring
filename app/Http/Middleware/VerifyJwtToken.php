<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyJWTToken
{
    public function handle(Request $request, Closure $next)
    {
        $token = session('jwt') ?? $request->cookie('jwt');
        if (!$token) {
            return redirect('/')->withErrors('Authorization token not provided.');
        }

        return $next($request);
    }
}
