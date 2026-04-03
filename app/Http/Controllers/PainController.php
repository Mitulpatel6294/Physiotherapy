<?php

namespace App\Http\Controllers;

use App\Services\PainService;
use Illuminate\Http\Request;

class PainController extends Controller
{
    protected $painService;

    public function __construct(PainService $painService)
    {
        $this->painService = $painService;
    }

    public function index()
    {
        $pains = $this->painService->getAllPains();

        return view('welcome', compact('pains'));
    }

    public function show(string $slug)
    {
        $pain = $this->painService->getPainBySlug($slug);

        return view('pain.show', compact('pain'));
    }
}
