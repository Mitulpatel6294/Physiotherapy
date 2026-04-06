<?php

namespace App\Services;

use App\Models\Therapist;
use Illuminate\Support\Facades\Cache;

class TherapistService
{
    /**
     * Get featured therapists and cache them permanently.
     */
    public function getFeaturedTherapists()
    {
        return Cache::rememberForever('therapists.featured', function () {
            return Therapist::where('is_featured', true)->get();
        });
    }
}
