<?php

namespace App\Services;

use App\Models\Pain;

class PainService
{
    /**
     * Create a new class instance.
     */
    public function getAllPains()
    {
        $pain = Pain::select('id', 'title', 'slug', 'main_image')->latest()->get();
        return $pain;
    }

    public function getPainBySlug(string $slug)
    {
        return Pain::with('images')
            ->where('slug', $slug)
            ->firstOrFail();
    }
}
