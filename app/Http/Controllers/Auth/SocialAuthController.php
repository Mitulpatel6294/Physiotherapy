<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialAuthController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect(); // no stateless here (for Blade support)
    }
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::where('email', $googleUser->getEmail())->first();

        if ($user) {
            $user->update([
                'provider' => 'google',
                'provider_id' => $googleUser->getId(),
            ]);
        } else {
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'provider' => 'google',
                'provider_id' => $googleUser->getId(),
                'password' => null,
                'role' => 'user',
            ]);
        }

        Auth::login($user);

        return redirect('/')->with('showSetPasswordModal', is_null($user->password));

    }
}
