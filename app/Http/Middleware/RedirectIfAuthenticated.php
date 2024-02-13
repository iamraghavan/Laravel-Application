<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            // User is already authenticated, redirect based on role
            return $this->redirectToRoleDashboard();
        }

        // Check if user_info session key is present
        if ($request->session()->has('user_info')) {
            return redirect($this->redirectToRoleDashboard());
        }

        return $next($request);
    }

    private function redirectToRoleDashboard()
    {
        // Fetch the authenticated user
        $user = Auth::user();

        // Implement your logic to determine the redirect URL based on user role
        switch ($user->role) {
            case 'admin':
                return '/admin';
            case 'user':
                return '/dashboard';
            // Add more cases for other roles as needed
            default:
                return '/';
        }
    }
}
