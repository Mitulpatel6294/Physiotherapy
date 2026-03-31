<?php

namespace App\Providers;

use App\Events\OtpRequested;
use App\Listeners\SendOtpListener;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    protected $listen = [
        OtpRequested::class => [
            SendOtpListener::class,
        ],
    ];

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
