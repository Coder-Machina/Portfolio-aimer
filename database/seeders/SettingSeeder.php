<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // [WHY] Primary site identity and contact links for AKODO Aimé D. Yves
        Setting::query()->updateOrCreate(
            ['id' => 1],
            [
                'site_name' => 'AKODO Aimé D. Yves',
                'contact_email' => 'aimeakd6@gmail.com',
                'phone' => '+229 01 40 89 06 34',
                'whatsapp_number' => '22901408906',
                'meta_description' => 'Vidéaste, monteur vidéo et créateur de contenu audiovisuel à Cotonou. Montage professionnel, TikTok, Reels, clipping.',
                'social_links' => [
                    ['platform' => 'TikTok', 'url' => 'https://www.tiktok.com/@lawi.soccer'],
                    ['platform' => 'WhatsApp', 'url' => 'https://wa.me/22901408906'],
                    ['platform' => 'Email', 'url' => 'mailto:aimeakd6@gmail.com'],
                ],
            ]
        );
    }
}
