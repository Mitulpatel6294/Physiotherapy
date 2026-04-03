<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pain extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_description',
        'full_description',
        'main_image',
        'slug'
    ];

    public function images()
    {
        return $this->hasMany(PainImage::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'pain_service');
    }
}
