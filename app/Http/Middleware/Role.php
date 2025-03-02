<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $role)
    {
        if (Auth::check()) {
            // Check if the user has the specified role
            if (Auth::user()->role == $role) {
                // User has the specified role; add a flag to the session
                session(['hasRole' => true]);
            } else {
                // User doesn't have the specified role; add a flag to the session
                session(['hasRole' => false]);
            }
        } else {
            // User is not authenticated; add a flag to the session
            session(['hasRole' => false]);
        }

        return $next($request);
    }
}
