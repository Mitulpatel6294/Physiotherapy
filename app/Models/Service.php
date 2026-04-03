<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'short_description',
        'full_description',
        'main_image',
        'category',
        'is_featured',
        'slug'
    ];

    public function images()
    {
        return $this->hasMany(ServiceImage::class);
    }

    public function pains()
    {
        return $this->belongsToMany(Pain::class, 'pain_service');
    }
}
