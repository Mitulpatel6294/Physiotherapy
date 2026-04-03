<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PainImage extends Model
{
    protected $fillable = ['pain_id', 'image_path'];

    public function pain()
    {
        return $this->belongsTo(Pain::class);
    }
}
