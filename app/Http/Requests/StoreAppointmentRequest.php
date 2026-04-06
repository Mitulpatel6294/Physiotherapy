<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'pain_area' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|string',
            'message' => 'nullable|string',
        ];
    }
}
