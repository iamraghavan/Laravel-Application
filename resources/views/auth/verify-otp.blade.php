<!-- verify-otp.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify OTP') }}</div>

                <div class="card-body">

                    @if($errors->any())
    <div class="alert alert-danger" role="alert">
        {{ $errors->first() }}
    </div>
@endif

                    <form method="POST" action="{{ url('/auth/verify-otp') }}">
                        @csrf
                        <input type="hidden" id="email" name="email" value="{{ session('login_email') }}">
                        <div class="mb-3">
                            <label for="otp" class="form-label">{{ __('OTP') }}</label>
                            <input type="text" class="form-control" id="otp" name="otp" required>
                        </div>

                        <button class="btn btn-primary">{{ __('Verify OTP') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    @include('admin.footer')
</div>


   

@endsection
