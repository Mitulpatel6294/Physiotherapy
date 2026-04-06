<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Support\Facades\Cache;

class ServiceService
{
    public function getAllServices()
    {
        return Cache::rememberForever('services.all', function () {
            return Service::select('id', 'title', 'slug', 'main_image', 'category')
                ->where('category', 'service')
                ->latest()
                ->get();
        });
    }

    public function getAllTechnologies()
    {
        return Cache::rememberForever('services.technologies', function () {
            return Service::select('id', 'title', 'slug', 'main_image', 'category')
                ->where('category', 'technology')
                ->latest()
                ->get();
        });
    }

    public function getServiceBySlug(string $slug)
    {
        return Cache::rememberForever('services.slug' . $slug, function () use ($slug) {
            return Service::with('images', 'pains')
                ->where('slug', $slug)
                ->firstOrFail();
        });
    }
}
