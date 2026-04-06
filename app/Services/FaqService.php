<?php

namespace App\Services;

use App\Models\Faq;
use Illuminate\Support\Facades\Cache;

class FaqService
{
    /**
     * Retrieve all FAQs, cached forever.
     *
     * @return \Illuminate\Database\Eloquent\Collection|\App\Models\Faq[]
     */
    public function getAllFaqs()
    {
        return Cache::rememberForever('faqs.all', function () {
            return Faq::latest()->get();
        });
    }

    /**
     * Clear the faqs cache manually (e.g., after saving/deleting FAQs).
     */
    public function clearCache()
    {
        Cache::forget('faqs.all');
    }
}
