<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Services\AppointmentService;

class AppointmentController extends Controller
{
    protected $appointmentService;

    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }

    public function store(StoreAppointmentRequest $request)
    {
        $this->appointmentService->store($request->validated());

        return redirect(url()->previous() . '#appointment')->with('appointment_success', 'Your appointment has been booked successfully!');
    }
}
