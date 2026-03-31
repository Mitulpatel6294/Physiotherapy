<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class OtpService
{
    protected int $otpLength = 6;
    protected int $expiryMinutes = 10;

    public function generate(): string
    {
        $min = (int) str_pad('1', $this->otpLength, '0');
        $max = (int) str_pad('', $this->otpLength, '9');

        return (string) random_int($min, $max);
    }

    public function hash(string $otp): string
    {
        return Hash::make($otp);
    }

    public function verify(string $otp, string $hash): bool
    {
        return Hash::check($otp, $hash);
    }

    public function expiry(): Carbon
    {
        return now()->addMinutes($this->expiryMinutes);
    }
    public function isExpired($expiry): bool
    {
        return now()->greaterThan($expiry);
    }
 
}