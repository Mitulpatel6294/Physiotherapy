<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Therapist extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'photo',
        'position',
        'description',
        'experience',
        'qualification',
        'is_featured'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
