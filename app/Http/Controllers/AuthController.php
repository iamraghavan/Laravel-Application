<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Mail\OtpVerificationMail;
use Illuminate\Support\Facades\Mail;
use Ichtrojan\Otp\Otp;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        session(['login_email' => $request->input('email')]);
        // Validate the form data
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Check if the user credentials are valid
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            // Generate OTP
            $otp = (new Otp)->generate($user->email, 'numeric', 6, 15);

            // Send OTP via email
            Mail::to($user->email)->send(new OtpVerificationMail($otp->token));

            // Redirect to OTP verification page
            return redirect('/auth/verify-otp')->with('email', $user->email);
        } else {
            // Invalid credentials
            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')],
            ]);
        }
    }
}
