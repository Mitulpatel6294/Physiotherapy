<?php

namespace App\Http\Controllers;

use App\Services\PainService;
use App\Services\ContactMessageService;
use App\Services\SettingService;
use Illuminate\Http\Request;

class PainController extends Controller
{
    protected PainService $painService;
    protected ContactMessageService $contactMessageService;
    protected SettingService $settingService;

    public function __construct(
        PainService $painService,
        ContactMessageService $contactMessageService,
        SettingService $settingService
    ) {
        $this->painService = $painService;
        $this->contactMessageService = $contactMessageService;
        $this->settingService = $settingService;
    }

    public function index()
    {
        $pains = $this->painService->getAllPains();
        $featuredServices = $this->painService->getFeaturedServices();
        $testimonials = $this->contactMessageService->getVisibleMessages('feedback', 6);
        $settings = $this->settingService->getSettings();

        return view('welcome', compact('pains', 'featuredServices', 'testimonials', 'settings'));
    }

    public function show(string $slug)
    {
        $pain = $this->painService->getPainBySlug($slug);

        return view('pain.show', compact('pain'));
    }
}
