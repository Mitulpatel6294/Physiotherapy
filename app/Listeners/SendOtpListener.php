<?php

namespace App\Listeners;

use App\Events\OtpRequested;
use App\Jobs\SendOtpJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendOtpListener
{

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    public function handle(OtpRequested $event): void
    {
        SendOtpJob::dispatch($event->email, $event->otp);
    }

}
