<?php

namespace App\Http\Controllers;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->checkUserLogin($request, $next);
            return $next($request);
        });
    }

    protected function checkUserLogin($request, Closure $next)
    {
        $userInfo = $request->session()->get('user_info');

        if ($userInfo) {
            // User is logged in based on session user_info
            $redirectUrl = $this->redirectBasedOnRole($userInfo['role']);

            if ($request->is('auth/login', 'auth/verify-otp')) {
                // If the user is logged in, redirect from login and verify-otp pages
                return redirect($redirectUrl);
            }
        }

        return $next($request);
    }

    protected function redirectBasedOnRole($role)
    {
        // Implement your logic to determine the redirect URL based on user role
        switch ($role) {
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