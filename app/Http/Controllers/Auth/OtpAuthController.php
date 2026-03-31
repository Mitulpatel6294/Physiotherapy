<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\VerifyOtpRequest;
use App\Http\Requests\ResendOtpRequest;
use App\Services\AuthOtpService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class OtpAuthController extends Controller
{
    public function __construct(
        protected AuthOtpService $service
    ) {
    }

    public function register(RegisterRequest $request)
    {
        $result = $this->service->register($request->validated());

        if ($result['status'] === 'error') {
            return back()->withErrors(['email' => $result['message']]);
        }

        return redirect()->route('otp.form', ['email' => $request->email])
            ->with('success', $result['message']);

    }

    public function verify(VerifyOtpRequest $request)
    {

        $result = $this->service->verify(
            $request->email,
            $request->otp
        );
        if (($result['status'] === 'error' && $result['message'] === 'Too many attempts')) {
            return redirect()->route('register.post')
                ->withErrors(['email' => 'Too many attempts. Please register again'], 'verify');
        }

        if ($result['status'] === 'error') {
            return back()
                ->withErrors(['otp' => $result['message']], 'verify')
                ->with('attempts_left', $result['data']['attempts_left'] ?? null)
                ->withInput(['email' => $request->email]);
        }
        if (($result['type'] ?? null) === 'password_reset') {
            return redirect()->route('password.reset.form', [
                'email' => $result['data']
            ]);
        }
        Auth::login($result['data']);

        return redirect()->route('home');
    }

    public function resend(ResendOtpRequest $request)
    {

        $result = $this->service->resend($request->email);

        if ($result['status'] === 'error') {
            return redirect()
                ->route('otp.form', ['email' => $request->email])
                ->withErrors(['email' => $result['message']], 'resend')
                ->with('remaining', $result['data']['remaining'] ?? 0);
        }

        return redirect()
            ->route('otp.form', ['email' => $request->email])
            ->with('success', $result['message'])
            ->with('remaining', 30);
    }
    public function forgot(ResendOtpRequest $request)
    {
        $result = $this->service->forgotPassword($request->email);

        if ($result['status'] === 'error') {
            return back()->withErrors(['email' => $result['message']]);
        }

        return redirect()
            ->route('otp.form', ['email' => $request->email])
            ->with('success', $result['message'])
            ->with('type', 'password_reset');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed'
        ]);

        $result = $this->service->resetPassword(
            $request->email,
            $request->password
        );

        if ($result['status'] === 'error') {
            return back()->withErrors(['email' => $result['message']]);
        }

        return redirect()->route('login')->with('success', 'Password reset successful');
    }
}
