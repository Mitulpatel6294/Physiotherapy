<?php

namespace App\Jobs;

use App\Mail\OtpMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendOtpJob implements ShouldQueue
{
    use Queueable;

    public function __construct(
        protected string $email,
        protected string $otp
    ) {
    }

    public function handle(): void
    {
        Mail::to($this->email)->send(new OtpMail($this->otp));
    }
}