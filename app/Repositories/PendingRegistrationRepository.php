<?php

namespace App\Repositories;

use App\Models\PendingRegistration;
use App\Repositories\Contracts\PendingRegistrationRepositoryInterface;

class PendingRegistrationRepository implements PendingRegistrationRepositoryInterface
{
    public function updateOrCreateByEmail(string $email, array $data): PendingRegistration
    {
        return PendingRegistration::updateOrCreate(['email' => $email], $data);
    }

    public function find(string $email): ?PendingRegistration
    {
        return PendingRegistration::firstWhere('email', $email);
    }

    public function update(string $email, array $data): bool
    {
        return PendingRegistration::where('email', $email)->update($data) > 0;
    }

    public function incrementAttempts(string $email): void
    {
        PendingRegistration::where('email', $email)->increment('attempts_count');
    }

    public function delete(string $email): void
    {
        PendingRegistration::where('email', $email)->delete();
    }
    public function deleteExpired(): void
    {
        PendingRegistration::where('created_at', '<', now()->subDay())->delete();
    }
    
}