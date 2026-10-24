<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Project;
use App\Models\Specialty;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Génère le sitemap.xml complet du portfolio (pages statiques, domaines et projets)';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('Génération du sitemap en cours...');

        $sitemap = Sitemap::create()
            ->add(Url::create('/')->setPriority(1.0)->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY))
            ->add(Url::create('/portfolio')->setPriority(0.9)->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY))
            ->add(Url::create('/services')->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY))
            ->add(Url::create('/a-propos')->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY))
            ->add(Url::create('/contact')->setPriority(0.7)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY));

        // [WHY] Automatically register all active competency domains
        Specialty::query()
            ->where('is_visible', true)
            ->get()
            ->each(function (Specialty $specialty) use ($sitemap): void {
                $sitemap->add(
                    Url::create("/portfolio/{$specialty->slug}")
                        ->setPriority(0.8)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                );
            });

        // [WHY] Automatically register all published projects with clean domain-scoped URLs
        Project::query()
            ->with('specialty')
            ->where('is_published', true)
            ->get()
            ->each(function (Project $project) use ($sitemap): void {
                if ($project->specialty) {
                    $sitemap->add(
                        Url::create("/portfolio/{$project->specialty->slug}/{$project->slug}")
                            ->setPriority(0.7)
                            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    );
                }
            });

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap généré avec succès dans public/sitemap.xml');

        return Command::SUCCESS;
    }
}
