<?php

namespace App\Services;

use App\Models\Pain;
use App\Models\Service;
use Illuminate\Support\Facades\Cache;

class PainService
{
    /**
     * Create a new class instance.
     */
    public function getAllPains()
    {
        return Cache::rememberForever('pains.all', function () {
            return Pain::select('id', 'title', 'slug', 'main_image')->latest()->get();
        });
    }

    public function getPainBySlug(string $slug)
    {
        return Cache::rememberForever('pains.slug.' . $slug, function () use ($slug) {
            return Pain::with(['images', 'services'])
                ->where('slug', $slug)
                ->firstOrFail();
        });
    }

    public function getFeaturedServices()
    {
        return Cache::rememberForever('services.featured', function () {
            return Service::select('id', 'title', 'short_description', 'main_image', 'category', 'slug')
                ->where('is_featured', true)
                ->latest()
                ->get();
        });
    }

}
