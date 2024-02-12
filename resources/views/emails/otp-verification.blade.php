@component('mail::message')

## OTP Verification
# 2FA code
Here is your login verification code:

<div style="text-align: center; font-size: 24px; margin-bottom: 20px;">

  <strong>{{ $otpToken }}</strong>

</div>

Please make sure you never share this code with anyone.
**Note:**  The code will expire in 15 minutes.



Thanks,<br>
Raghavan Jeeva - Developer<br>
{{ config('app.name') }}

@endcomponent
