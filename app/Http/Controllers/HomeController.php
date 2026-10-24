<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the portfolio landing page.
     */
    public function __invoke(): View
    {
        // [WHY] Select top 3 featured projects, top services and visible testimonials for the home page
        $featuredProjects = Project::query()
            ->with('specialty')
            ->where('is_published', true)
            ->where('is_featured', true)
            ->orderBy('order')
            ->limit(3)
            ->get();

        $services = Service::query()
            ->orderBy('order')
            ->limit(4)
            ->get();

        $testimonials = Testimonial::query()
            ->where('is_visible', true)
            ->latest()
            ->limit(3)
            ->get();

        return view('pages.home', compact('featuredProjects', 'services', 'testimonials'));
    }
}
