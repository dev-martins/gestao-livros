<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthCheck
{
    public function handle($request, Closure $next)
    {
        if ($request->path() != 'login') {
            if (isset($_COOKIE['token'])) {
                $token = $_COOKIE['token'];
                $request->headers->set('Authorization', 'Bearer ' . $token);
                if (!Auth::guard('api')->check())
                    return redirect('/login');
            } else {
                return redirect('/login');
            }
        }

        return $next($request);
    }
}
