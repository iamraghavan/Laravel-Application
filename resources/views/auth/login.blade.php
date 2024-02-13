<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('content')

<div id="auth">
        
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <img src="{{ asset("https://egspgroup.in/mailLogo.png") }}" alt="Logo"></a>
                </div>
                <h1 class="auth-title">Log in.</h1>
                <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>
    
                <form method="POST" action="{{ url('/auth/login') }}">
                    @csrf

                    <input type="hidden" id="identifier" name="identifier" value="{{ session('login_email') }}">



                    <div class="form-group position-relative has-icon-left mb-4">
                        <input id="email" placeholder="Email" type="email" class="form-control form-control-xl @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        
                        <div class="form-control-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input id="password" placeholder="Password" type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-control-icon">
                            <i class="bi bi-key"></i>
                        </div>
                    </div>
                   
                    <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
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
