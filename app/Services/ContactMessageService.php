<?php

namespace App\Services;

use App\Models\ContactMessage;

class ContactMessageService
{
    /**
     * Store a new contact message (question or feedback).
     */
    public function store(array $data): ContactMessage
    {
        return ContactMessage::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'type' => $data['type'],
            'message' => $data['message'],
            'show_flag' => false,
        ]);
    }

    /**
     * Get feedback/testimonials visible on the public site (show_flag = true).
     * Optionally limit to a specific type: 'feedback' or 'question'.
     *
     * @param  string|null $type
     * @param  int         $limit
     */
    public function getVisibleMessages(?string $type = null, int $limit = 6): \Illuminate\Database\Eloquent\Collection
    {
        return ContactMessage::where('show_flag', true)
            ->when($type, fn($q) => $q->where('type', $type))
            ->latest()
            ->limit($limit)
            ->get();
    }
}
