<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Queue\ShouldQueue;



class UserLoggedInListener implements ShouldQueue
{
 
    public function handle(UserLoggedIn $event)
    {
        $user = $event->user;

        // Generate OTP
        $otp = mt_rand(100000, 999999);

        // Store OTP in session for verification
        Session::put('otp', $otp);

        // Redirect to OTP verification page
        return redirect('/auth/verify-otp');
    
    
    }

    
}
