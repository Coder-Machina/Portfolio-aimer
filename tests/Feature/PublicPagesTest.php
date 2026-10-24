<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Project;
use App\Models\Specialty;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_home_page_is_successful(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertSee('AKODO Aimé D. Yves');
        $response->assertSee('Monteur vidéo', false);
        $response->assertSee('Créateur de contenu', false);
    }

    public function test_portfolio_index_displays_specialties_and_projects(): void
    {
        $response = $this->get(route('portfolio.index'));

        $response->assertOk();
        $response->assertSee('Vidéo & Audiovisuel');
        $response->assertSee('Informatique & Développement');
    }

    public function test_specialty_page_is_accessible_by_slug(): void
    {
        $specialty = Specialty::query()->where('slug', 'video-audiovisuel')->firstOrFail();

        $response = $this->get(route('portfolio.specialty', $specialty));

        $response->assertOk();
        $response->assertSee($specialty->name);
    }

    public function test_project_detail_page_is_accessible(): void
    {
        $project = Project::query()->where('is_published', true)->firstOrFail();

        $response = $this->get(route('portfolio.project', [
            'specialty' => $project->specialty->slug,
            'project' => $project->slug,
        ]));

        $response->assertOk();
        $response->assertSee($project->title);
        $response->assertSee('Outils & technologies mobilisés', false);
        $response->assertSee('Discuter de ce projet sur WhatsApp');
    }

    public function test_services_page_displays_all_services(): void
    {
        $response = $this->get(route('services'));

        $response->assertOk();
        $response->assertSee('Montage vidéo professionnel');
        $response->assertSee('Clipping');
    }

    public function test_about_page_displays_credentials_and_formations(): void
    {
        $response = $this->get(route('about'));

        $response->assertOk();
        $response->assertSee('ESGIS');
        $response->assertSee('Intelligence Artificielle');
    }

    public function test_contact_page_is_accessible(): void
    {
        $response = $this->get(route('contact.create'));

        $response->assertOk();
        $response->assertSee('Travaillons ensemble');
    }
}
