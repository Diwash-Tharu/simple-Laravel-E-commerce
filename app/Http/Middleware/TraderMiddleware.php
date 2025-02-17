<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class TraderMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->role == '2') {
                return $next($request);
            } else {
                return redirect('/home')->with('status', 'Access Denied! As you are not a trader.');
            }

        } else {
            return redirect('/home')->with('status', 'Please Login First!!');

        }
    }
}
