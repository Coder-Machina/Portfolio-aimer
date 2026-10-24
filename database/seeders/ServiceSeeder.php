<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Montage vidéo professionnel',
                'description' => 'Je monte vos rushs bruts en une vidéo finale propre, rythmée et prête à publier.',
                'price' => 'Tarif sur demande',
                'order' => 1,
            ],
            [
                'title' => 'Création de contenu réseaux sociaux',
                'description' => 'Prise en charge complète : idée, script, tournage et montage pour TikTok, Instagram Reels, Facebook.',
                'price' => 'Tarif sur demande',
                'order' => 2,
            ],
            [
                'title' => 'Clipping',
                'description' => 'Je repère et découpe les meilleurs moments de vos longues vidéos et les adapte au format court (TikTok/Reels) avec sous-titres et titre.',
                'price' => 'Tarif sur demande',
                'order' => 3,
            ],
            [
                'title' => 'Vidéos animées par IA',
                'description' => 'Production de vidéos animées avec voix off générée, sous-titres automatiques et effets IA.',
                'price' => 'Tarif sur demande',
                'order' => 4,
            ],
        ];

        foreach ($services as $service) {
            Service::query()->updateOrCreate(
                ['title' => $service['title']],
                $service
            );
        }
    }
}
