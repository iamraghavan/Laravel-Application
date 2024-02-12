<!-- user-registration.blade.php -->
@component('mail::message')
# Welcome to Nirvaagam

Hello {{ $user['name'] }}, 

Welcome to Nirvaagam! Your registration was successful.

Here are your details:

- **Username:** {{ $user['username'] }}
- **Email:** {{ $user['email'] }}
- **Password:** {{ $user['password'] }}
- **Role:** {{ $user['role'] }}

Thank you for joining us!

@component('mail::button', ['url' => ''])
Visit Nirvaagam
@endcomponent

Thanks,<br>
Raghavan Jeeva - Developer
@endcomponent
