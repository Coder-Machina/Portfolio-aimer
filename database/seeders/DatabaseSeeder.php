<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // [WHY] Strict seed sequence respecting foreign keys and domain hierarchy
        $this->call([
            UserSeeder::class,
            SettingSeeder::class,
            AboutSeeder::class,
            SpecialtySeeder::class,
            SpecialtySkillSeeder::class,
            ServiceSeeder::class,
            ProjectSeeder::class,
            TestimonialSeeder::class,
        ]);
    }
}
