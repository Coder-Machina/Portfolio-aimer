<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Specialty;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    /**
     * Display the full portfolio with tabbed specialties.
     */
    public function index(): View
    {
        $specialties = Specialty::query()
            ->where('is_visible', true)
            ->orderBy('order')
            ->with([
                'skills',
                'tools',
                'projects' => fn ($q) => $q->where('is_published', true)->orderBy('order'),
            ])
            ->get();

        return view('pages.portfolio.index', compact('specialties'));
    }

    /**
     * Display a standalone page for a single competency domain.
     */
    public function specialty(Specialty $specialty): View
    {
        abort_unless($specialty->is_visible, 404);

        $specialty->load([
            'skills',
            'tools',
            'projects' => fn ($q) => $q->where('is_published', true)->orderBy('order'),
        ]);

        return view('pages.portfolio.specialty', compact('specialty'));
    }

    /**
     * Display a detailed presentation for an individual project.
     */
    public function project(Specialty $specialty, Project $project): View
    {
        abort_unless(
            $specialty->is_visible && $project->is_published && $project->specialty_id === $specialty->id,
            404
        );

        $specialty->load('tools');

        // [WHY] Compute previous and next projects within the domain for seamless linear browsing
        $previousProject = Project::query()
            ->where('specialty_id', $specialty->id)
            ->where('is_published', true)
            ->where('order', '<', $project->order)
            ->orderBy('order', 'desc')
            ->first();

        $nextProject = Project::query()
            ->where('specialty_id', $specialty->id)
            ->where('is_published', true)
            ->where('order', '>', $project->order)
            ->orderBy('order', 'asc')
            ->first();

        return view('pages.portfolio.project', compact('specialty', 'project', 'previousProject', 'nextProject'));
    }
}
