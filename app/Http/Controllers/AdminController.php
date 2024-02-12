<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use App\Mail\UserRegistrationMail;
use Illuminate\Support\Facades\Mail;


class AdminController extends Controller
{
    public function index(){
        return view('admin.admin_dashboard');
    }

    public function new_user(){
        return view('admin.new_user');
    }


    
    // Inside the store method of your AdminController
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users',
            'email' => 'required|string|email|unique:users',
            'mobile' => 'required|string|unique:users',
            'role' => 'required|string|in:controller,executive,store_manager,admin',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // Generate user_id
        $userId = 'EGSPN'.strtoupper(substr($validatedData['role'], 0, 1)) . str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
        $validatedData['user_id'] = $userId;  // Add this line to set the 'user_id'
    
        // Create the user
        $user = User::create([
            'user_id' => $validatedData['user_id'], 
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'mobile' => $validatedData['mobile'],
            'role' => $validatedData['role'],
            'password' => Hash::make($validatedData['password']),
        ]);
    
        Mail::to($user->email)->send(new UserRegistrationMail($validatedData));
    
        // Redirect with success message
        return redirect('/admin')->with('success', 'User created successfully.');

    }




}
