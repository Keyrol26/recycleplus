<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $user = Auth::user();
        if ($user->role == 1) {
            return $next($request);
        }
        if ($user->role == 0) {
            return redirect()->route('superadmin');
        }
        if ($user->role == 2) {
            return redirect()->route('client');
        }
        if ($user->role == 3) {
            return redirect()->route('collector');
        }
        return redirect('/')->with('error', 'Unauthorized access.');
    }
    // public function handle($request, Closure $next)
    // {
    //     if (Auth::check() && Auth::user()->role == 1) {
    //         return $next($request);
    //     }
    //     return redirect('/')->with('error', 'Unauthorized access.');
    // }
}
