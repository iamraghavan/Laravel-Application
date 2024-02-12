<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateRole
{
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Continue to the next request
            return $next($request);
        }

        // Redirect to the login page if not authenticated
        return redirect()->route('/')->with('error', 'Please login to access this page.');
    }
}