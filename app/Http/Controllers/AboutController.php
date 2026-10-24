<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Specialty;
use Illuminate\View\View;

class AboutController extends Controller
{
    /**
     * Display the about biography, credentials, skills and downloadable CV page.
     */
    public function __invoke(): View
    {
        $about = About::query()->first();

        $specialties = Specialty::query()
            ->where('is_visible', true)
            ->orderBy('order')
            ->with(['skills', 'tools'])
            ->get();

        return view('pages.about', compact('about', 'specialties'));
    }
}
