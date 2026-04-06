<?php

namespace App\Http\Controllers;

use App\Services\ServiceService;

class ServiceController extends Controller
{
    protected $serviceService;

    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    public function index()
    {
        $services = $this->serviceService->getAllServices();
        $technologies = $this->serviceService->getAllTechnologies();

        return view('service', compact('services', 'technologies'));
    }

    public function show(string $slug)
    {
        $service = $this->serviceService->getServiceBySlug($slug);

        return view('service.show', compact('service'));
    }
}
