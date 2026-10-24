<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Specialty;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $video = Specialty::query()->where('slug', 'video-audiovisuel')->first();
        $info = Specialty::query()->where('slug', 'informatique')->first();

        // ── Domaine : Vidéo & Audiovisuel ──────────────────────────────────────────
        if ($video !== null) {
            $videoProjects = [
                [
                    'title' => 'Contenu Supreme Academy — Mode & Marketing',
                    'description' => 'Conception, tournage et montage de contenus vidéo pour les réseaux sociaux de Supreme Academy, école de mode et de marketing à Cotonou.',
                    'tiktok_url' => 'https://vm.tiktok.com/ZSgRxpFRS/',
                    'project_url' => null,
                    'tags' => ['Fashion', 'Mode', 'Supreme Academy', 'Réseaux sociaux'],
                    'is_featured' => true,
                    'is_published' => true,
                    'order' => 1,
                ],
                [
                    'title' => 'Montage Football — Clips à forte audience',
                    'description' => 'Vidéos football à forte audience. Concept, sélection des séquences, montage rythmé et sous-titres.',
                    'tiktok_url' => 'https://www.tiktok.com/@lawi.soccer/video/7671274345758690562',
                    'project_url' => null,
                    'tags' => ['Football', 'Sport', 'Clips'],
                    'is_featured' => true,
                    'is_published' => true,
                    'order' => 2,
                ],
                [
                    'title' => 'Création Vidéo — Série 1',
                    'description' => 'Format dynamique conçu pour susciter l\'engagement sur TikTok et Instagram Reels.',
                    'tiktok_url' => 'https://vm.tiktok.com/ZSgR9Kgwy/',
                    'project_url' => null,
                    'tags' => ['Montage', 'Création'],
                    'is_featured' => true,
                    'is_published' => true,
                    'order' => 3,
                ],
                [
                    'title' => 'Création Vidéo — Série 2',
                    'description' => 'Montage vertical immersif avec sous-titres animés et sound design percutant.',
                    'tiktok_url' => 'https://vm.tiktok.com/ZSgR9x6sG/',
                    'project_url' => null,
                    'tags' => ['Montage', 'Création'],
                    'is_featured' => true,
                    'is_published' => true,
                    'order' => 4,
                ],
                [
                    'title' => 'Création Vidéo — Série 3',
                    'description' => 'Storytelling court et mise en valeur des moments forts pour maximiser la rétention.',
                    'tiktok_url' => 'https://vm.tiktok.com/ZSgRxNQJc/',
                    'project_url' => null,
                    'tags' => ['Montage', 'Création'],
                    'is_featured' => true,
                    'is_published' => true,
                    'order' => 5,
                ],
                [
                    'title' => 'Création Vidéo — Série 4',
                    'description' => 'Édition créative rythmée avec habillage graphique personnalisé.',
                    'tiktok_url' => 'https://vm.tiktok.com/ZSgR9kmKL/',
                    'project_url' => null,
                    'tags' => ['Montage', 'Création'],
                    'is_featured' => true,
                    'is_published' => true,
                    'order' => 6,
                ],
            ];

            foreach ($videoProjects as $data) {
                Project::query()->updateOrCreate(
                    ['title' => $data['title']],
                    array_merge($data, ['specialty_id' => $video->id])
                );
            }
        }

        // ── Domaine : Informatique & Développement ──────────────────────────────────
        if ($info !== null) {
            $infoProjects = [
                [
                    'title' => 'TikClip — Automatisation du montage vidéo',
                    'description' => 'Outil d\'automatisation : à partir d\'une vidéo TikTok, il retranscrit le script (Whisper), le réécrit, génère la voix off et incruste sous-titres et titre automatiquement. Stack : Node.js, FFmpeg, Whisper.',
                    'tiktok_url' => null,
                    'project_url' => null,
                    'tags' => ['Automatisation', 'Node.js', 'IA', 'FFmpeg'],
                    'is_featured' => false,
                    'is_published' => true,
                    'order' => 1,
                ],
                [
                    'title' => 'Bénin SECOURS — Assistance routière mobile',
                    'description' => 'Plateforme mobile d\'assistance routière géolocalisée pour le Bénin. Permet de localiser et contacter un secours en cas de panne ou accident. Stack : React & Supabase.',
                    'tiktok_url' => null,
                    'project_url' => 'https://benin-secours.vercel.app',
                    'tags' => ['Mobile', 'React', 'Supabase', 'Géolocalisation'],
                    'is_featured' => false,
                    'is_published' => true,
                    'order' => 2,
                ],
                [
                    'title' => 'Biblio Cotonou — Gestion de bibliothèque',
                    'description' => 'Application web complète de gestion de bibliothèque : catalogue, emprunts, retours, gestion des adhérents. Stack : PHP / Laravel.',
                    'tiktok_url' => null,
                    'project_url' => null,
                    'tags' => ['Laravel', 'PHP', 'CRUD', 'Gestion'],
                    'is_featured' => false,
                    'is_published' => true,
                    'order' => 3,
                ],
                [
                    'title' => 'Mobile UI Clones — Spotify & WhatsApp',
                    'description' => 'Reproduction fidèle et pixel-perfect des interfaces Spotify et WhatsApp en Flutter. Exercice de maîtrise des layouts et widgets Flutter.',
                    'tiktok_url' => null,
                    'project_url' => null,
                    'tags' => ['Flutter', 'Dart', 'UI', 'Mobile'],
                    'is_featured' => false,
                    'is_published' => true,
                    'order' => 4,
                ],
            ];

            foreach ($infoProjects as $data) {
                Project::query()->updateOrCreate(
                    ['title' => $data['title']],
                    array_merge($data, ['specialty_id' => $info->id])
                );
            }
        }
    }
}
