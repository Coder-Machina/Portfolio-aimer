<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display the services and pricing page.
     */
    public function __invoke(): View
    {
        $services = Service::query()
            ->orderBy('order')
            ->get();

        return view('pages.services', compact('services'));
    }
}
