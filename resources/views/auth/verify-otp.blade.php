<!-- verify-otp.blade.php -->
@extends('layouts.app')

@section('content')




<div id="auth">
        
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <img src="{{ asset("https://egspgroup.in/mailLogo.png") }}" alt="Logo"></a>
                </div>
                <h1 class="auth-title">OTP</h1>
                <p class="auth-subtitle mb-5">Verify OTP to Continue Nirvaagam Application.</p>
    
                <form method="POST" action="{{ url('/auth/verify-otp') }}">
                    @csrf

                    <input type="hidden" id="email" name="email" value="{{ session('login_email') }}">

                    
                    <div class="form-group position-relative has-icon-left mb-1">
                        <input placeholder="Enter OTP" type="text" class="form-control form-control-xl" autocomplete="off" id="otp" name="otp" required>
        
                        
                    </div>
                   
                    <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">{{ __('Verify OTP') }}</button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif

@include('admin.footer')
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">
                <img src="{{ asset('https://www.egspcoe.org/admin/images/slider/slider1.jpg') }}" alt="" class="img-fluid">
            </div>
        </div>
        
    </div>
    
        </div>


   

@endsection
