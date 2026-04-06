<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingService
{
    /**
     * Retrieve global settings, cached forever.
     */
    public function getSettings()
    {
        return Cache::rememberForever('settings.global', function () {
            return Setting::first();
        });
    }

    /**
     * Clear the settings cache manually (e.g., after updating settings).
     */
    public function clearCache()
    {
        Cache::forget('settings.global');
    }
}
