<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // [WHY] Client's actual biography and background credentials
        About::query()->updateOrCreate(
            ['id' => 1],
            [
                'bio' => "Vidéaste, monteur vidéo et créateur de contenu audiovisuel basé à Cotonou. Titulaire d'une Licence en Génie Logiciel (ESGIS, 2026), formé en Design Graphique & Montage Vidéo. Je conçois mes contenus de A à Z : idée, concept, script, cadrage, tournage et montage. Je réalise les contenus vidéo de Supreme Academy pour ses réseaux sociaux, et je produis mes propres vidéos animées par IA et vidéos de football à forte audience.",
            ]
        );
    }
}
