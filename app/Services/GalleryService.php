<?php

namespace App\Services;

use App\Models\Gallery;
use Illuminate\Support\Facades\Cache;

class GalleryService
{
    /**
     * Retrieve all gallery images, cached forever.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\App\Models\Gallery[]
     */
    public function getAllImages()
    {
        return Cache::rememberForever('gallery.all', function () {
            return Gallery::latest()->get();
        });
    }

    /**
     * Clear the gallery cache manually (e.g., after saving/deleting resources).
     */
    public function clearCache()
    {
        Cache::forget('gallery.all');
    }
}
