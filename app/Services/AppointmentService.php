<?php

namespace App\Services;

use App\Models\Appointment;

class AppointmentService
{
    public function store(array $data)
    {
        return Appointment::create($data);
    }
}
