<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMessageRequest;
use App\Services\ContactMessageService;
use App\Services\SettingService;
use App\Services\FaqService;

class ContactController extends Controller
{
    protected ContactMessageService $contactMessageService;
    protected SettingService $settingService;
    protected FaqService $faqService;

    public function __construct(
        ContactMessageService $contactMessageService,
        SettingService $settingService,
        FaqService $faqService
    ) {
        $this->contactMessageService = $contactMessageService;
        $this->settingService = $settingService;
        $this->faqService = $faqService;
    }

    /**
     * Display the contact page.
     */
    public function index()
    {
        $settings = $this->settingService->getSettings();
        $faqs = $this->faqService->getAllFaqs();

        return view('contact', compact('settings', 'faqs'));
    }

    /**
     * Handle the Send-a-Message form submission.
     */
    public function store(ContactMessageRequest $request)
    {
        $this->contactMessageService->store($request->validated());

        return redirect()
            ->route('contact')
            ->with('success', 'Thank you! Your message has been sent successfully. We will get back to you soon.');
    }
}
