<?php

namespace App\Providers;

use App\Repositories\Contracts\PendingRegistrationRepositoryInterface;
use App\Repositories\PendingRegistrationRepository;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            PendingRegistrationRepositoryInterface::class,
            PendingRegistrationRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('register', function (Request $request) {
            return Limit::perMinutes(1, 2)->by($request->ip());
        });
        RateLimiter::for('verify', function (Request $request) {
            return Limit::perMinutes(5, 5)->by(
                $request->ip() . '|' . $request->input('email')
            );
        });
    }
}
