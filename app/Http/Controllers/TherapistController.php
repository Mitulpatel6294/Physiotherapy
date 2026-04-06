<?php

namespace App\Http\Controllers;

use App\Services\TherapistService;
use App\Services\ContactMessageService;
use App\Services\SettingService;
use App\Services\GalleryService;
use App\Models\User;
use App\Models\Therapist;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class TherapistController extends Controller
{
    protected TherapistService $therapistService;
    protected ContactMessageService $contactMessageService;
    protected SettingService $settingService;
    protected GalleryService $galleryService;

    public function __construct(
        TherapistService $therapistService,
        ContactMessageService $contactMessageService,
        SettingService $settingService,
        GalleryService $galleryService
    ) {
        $this->therapistService = $therapistService;
        $this->contactMessageService = $contactMessageService;
        $this->settingService = $settingService;
        $this->galleryService = $galleryService;
    }

    public function about()
    {
        $feedbacks = $this->contactMessageService->getVisibleMessages('feedback', 6);
        $settings = $this->settingService->getSettings();
        $therapists = $this->therapistService->getFeaturedTherapists();
        
        $galleries = $this->galleryService->getAllImages();

        $patientCount = Cache::rememberForever('patient.count', function () {
            return User::where('role', 'user')->count();
        });

        $expertCount = Cache::rememberForever('expert.count', function () {
            return Therapist::count();
        });

        return view('about', compact('feedbacks', 'settings', 'therapists', 'galleries', 'patientCount', 'expertCount'));
    }
}
