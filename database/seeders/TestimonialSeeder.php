<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Specialty;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $video = Specialty::query()->where('slug', 'video-audiovisuel')->first();

        $testimonials = [
            [
                'specialty_id' => $video?->id,
                'client_name' => 'Supreme Academy',
                'text' => 'Aimé a su transformer nos idées en vidéos captivantes pour nos réseaux sociaux. Le rythme, le cadrage et l\'énergie correspondent parfaitement à notre image de marque.',
                'rating' => 5,
                'is_visible' => true,
            ],
            [
                'specialty_id' => $video?->id,
                'client_name' => 'Créateur de contenu TikTok',
                'text' => 'Montages ultra rythmés, respect absolu des délais et excellente compréhension des codes viraux. Mes stats ont doublé en 2 mois.',
                'rating' => 5,
                'is_visible' => true,
            ],
            [
                'specialty_id' => null,
                'client_name' => 'Agence Digitale Cotonou',
                'text' => 'Un professionnel complet : à la fois créatif sur la vidéo et rigoureux sur les aspects techniques. Collaboration fluide et résultat au standard.',
                'rating' => 5,
                'is_visible' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::query()->updateOrCreate(
                ['client_name' => $testimonial['client_name']],
                $testimonial
            );
        }
    }
}
