<?php

namespace App\Repositories\Contracts;

use App\Models\PendingRegistration;

interface PendingRegistrationRepositoryInterface
{
    public function updateOrCreateByEmail(string $email, array $data): PendingRegistration;

    public function find(string $email): ?PendingRegistration;

    public function update(string $email, array $data): bool;

    public function incrementAttempts(string $email): void;

    public function delete(string $email): void;
    public function deleteExpired(): void;

}