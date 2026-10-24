<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Seeder;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // [WHY] Seed default competency domains with slugs and Heroicons
        Specialty::query()->updateOrCreate(
            ['slug' => 'video-audiovisuel'],
            [
                'name' => 'Vidéo & Audiovisuel',
                'description' => 'Vidéaste, monteur vidéo et créateur de contenu. Je conçois vos contenus de A à Z : concept, script, tournage, montage — pour TikTok, Reels et au-delà.',
                'icon' => 'video-camera',
                'color' => '#D4A847',
                'order' => 1,
                'is_visible' => true,
            ]
        );

        Specialty::query()->updateOrCreate(
            ['slug' => 'informatique'],
            [
                'name' => 'Informatique & Développement',
                'description' => 'Développeur d\'applications mobiles et web. Projets concrets allant de l\'automatisation au développement d\'outils numériques sur mesure.',
                'icon' => 'code-bracket',
                'color' => '#909090',
                'order' => 2,
                'is_visible' => true,
            ]
        );
    }
}
