<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpVerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otpToken;

    public function __construct($otpToken)
    {
        $this->otpToken = $otpToken;
    }

    public function build()
    {
        return $this->markdown('emails.otp-verification');
    }
}
