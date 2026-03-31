<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingRegistration extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'otp_hash',
        'otp_expires_at',
        'attempts_count',
        'last_sent_at',
        'type',
    ];
    protected $hidden = [
        'otp_hash',
        'password',
    ];
    protected $casts = [
        'otp_expires_at' => 'datetime',
        'last_sent_at' => 'datetime',
    ];
}
