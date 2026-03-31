<?php

namespace App\Console\Commands;

use App\Repositories\Contracts\PendingRegistrationRepositoryInterface;
use Illuminate\Console\Command;

class CleanPendingRegistrations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clean-pending-registrations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        app(PendingRegistrationRepositoryInterface::class)->deleteExpired();
    }
}
