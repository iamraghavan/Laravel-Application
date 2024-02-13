<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ichtrojan\Otp\Otp;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OtpController extends Controller
{

  


    public function showVerificationForm()
    {
        return view('auth.verify-otp');
    }

    private function redirectBasedOnRole($user)
    {
        // Fetch the user's role from the database
        $user = User::find($user->id);

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

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
            'email' => 'required|email',
        ],[
            'otp.required' => 'Invalid OTP Please try again.',
            'otp.numeric' => 'Invalid OTP. Please try again.',
            'email.required' => 'Invalid OTP. Please try again.', // Add this line
            'email.email' => 'Invalid OTP. Please try again.', // Add this line
        ]);

        $email = $request->input('email');
        $otp = $request->input('otp');

        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json(['status' => false, 'message' => 'User not found. Please try again.'], 404);
        }

        // Fetch the corresponding OTP record from the database
        $otpRecord = DB::table('otps')
            ->where('identifier', $email)
            ->where('token', $otp)
            ->where('valid', 1)
            ->first();

        if (!$otpRecord) {
            return response()->json(['status' => false, 'message' => 'Invalid OTP. Please try again.'], 422);
        }

        // Use the existing OTP instance to validate
        $otpInstance = new Otp;
        $otpValidation = $otpInstance->validate($email, $otp);

        if ($otpValidation->status) {
            // Log in the user
            auth()->login($user);

            // Store user info in local storage
            $userInfo = [
                'id' => $user->user_id,
                'email' => $user->email,
                'role' => $user->role,
            ];
            $request->session()->put('user_info', $userInfo);
            
            // $request->response()->json(['user_info' => $userInfo]);

            // Redirect to the desired URL after successful OTP verification
            $redirectUrl = $this->redirectBasedOnRole($user);

            // Update the OTP record as used
            DB::table('otps')
                ->where('id', $otpRecord->id)
                ->update(['valid' => 0]);

            // Redirect to the role-specific URL without showing the response
            return redirect($redirectUrl)->withSuccess('success', 'OTP verification successful');
        } else {
            return redirect()->route('verify-otp')->withErrors(['error' => 'Invalid OTP. Please try again.']);
        }
        
        
        
        
        
    }
}
