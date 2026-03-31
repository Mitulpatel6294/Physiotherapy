<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\PendingRegistrationRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Events\OtpRequested;
use Illuminate\Support\Facades\RateLimiter;

class AuthOtpService
{
    protected int $maxAttempts = 5;
    public function __construct(
        protected PendingRegistrationRepositoryInterface $repo,
        protected OtpService $otpService
    ) {
    }
    protected function rateLimitKey(string $email): string
    {
        return request()->ip() . '|' . $email;
    }
    public function register(array $data): array
    {
        if (User::where('email', $data['email'])->exists()) {
            return [
                's  tatus' => 'error',
                'message' => 'User already exists'
            ];
        }

        $otp = $this->otpService->generate();

        $this->repo->updateOrCreateByEmail($data['email'], [
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'otp_hash' => $this->otpService->hash($otp),
            'otp_expires_at' => $this->otpService->expiry(),
            'attempts_count' => 0,
            'last_sent_at' => now(),
        ]);
        event(new OtpRequested($data['email'], $otp));

        return [
            'status' => 'success',
            'message' => 'OTP sent successfully'
        ];
    }

    public function verify(string $email, string $otp): array
    {
        $record = $this->repo->find($email);
        if (!$record) {
            return [
                'status' => 'error',
                'message' => 'No request found',
                'data' => [
                    'attempts_left' => 0
                ]
            ];
        }
    
        if ($this->otpService->isExpired($record->otp_expires_at)) {
            return [
                'status' => 'error',
                'message' => 'OTP expired'
            ];
        }
        if ($record->type === 'password_reset') {
            return [
                'status' => 'success',
                'message' => 'OTP verified',
                'type' => 'password_reset',
                'data' => $record->email
            ];
        }

        if (!$this->otpService->verify($otp, $record->otp_hash)) {

            $this->repo->incrementAttempts($email);
            $record = $this->repo->find($email);

            $attemptsUsed = $record->attempts_count + 1;

            if ($attemptsUsed >= $this->maxAttempts) {
                $this->repo->delete($email);
                RateLimiter::clear($this->rateLimitKey($email));

                return [
                    'status' => 'error',
                    'message' => 'Too many attempts'
                ];
            }

            $remaining = 0;

            if ($record && $record->last_sent_at) {
                $remaining = max(0, 30 - now()->diffInSeconds($record->last_sent_at));
            }

            return [
                'status' => 'error',
                'message' => 'Invalid OTP',
                'data' => [
                    'attempts_left' => $this->maxAttempts - $attemptsUsed
                ]
            ];
        }

        $user = DB::transaction(function () use ($record, $email) {
            $user = User::create([
                'name' => $record->name,
                'email' => $record->email,
                'password' => $record->password,
            ]);

            $this->repo->delete($email);

            return $user;
        });

        return [
            'status' => 'success',
            'message' => 'OTP verified successfully',
            'data' => $user
        ];
    }
    public function resend(string $email): array
    {
        $record = $this->repo->find($email);

        if (!$record) {
            return [
                'status' => 'error',
                'message' => 'No request found'
            ];
        }

        if ($record->last_sent_at && now()->lt($record->last_sent_at->addSeconds(30))) {
            return [
                'status' => 'error',
                'message' => 'Please wait before requesting again',
                'data' => [
                    'remaining' => now()->diffInSeconds($record->last_sent_at->addSeconds(30))
                ]
            ];
        }
        RateLimiter::clear($this->rateLimitKey($email));
        // generate new OTP
        $otp = $this->otpService->generate();


        // update DB
        $this->repo->update($email, [
            'otp_hash' => $this->otpService->hash($otp),
            'otp_expires_at' => now()->addMinutes(10),
            'last_sent_at' => now(), // IMPORTANT
            'attempts_count' => 0,
        ]);

        event(new OtpRequested($email, $otp));

        return [
            'status' => 'success',
            'message' => 'OTP resent successfully',
            'data' => [
                'remaining' => 30
            ]
        ];
    }
    public function forgotPassword(string $email): array
    {

        $user = User::where('email', $email)->first();
        if (!$user) {
            return [
                'status' => 'error',
                'message' => 'User not found'
            ];
        }

        $otp = $this->otpService->generate();

        $this->repo->updateOrCreateByEmail($email, [
            'name' => $user->name,
            'password' => $user->password,
            'otp_hash' => $this->otpService->hash($otp),
            'otp_expires_at' => $this->otpService->expiry(),
            'attempts_count' => 0,
            'last_sent_at' => now(),
            'type' => 'password_reset'
        ]);

        event(new OtpRequested($email, $otp));

        return [
            'status' => 'success',
            'message' => 'OTP sent for password reset'
        ];
    }
    public function resetPassword(string $email, string $password): array
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            return [
                'status' => 'error',
                'message' => 'User not found'
            ];
        }

        $user->update([
            'password' => Hash::make($password)
        ]);

        $this->repo->delete($email);

        return [
            'status' => 'success',
            'message' => 'Password reset successful'
        ];
    }
}