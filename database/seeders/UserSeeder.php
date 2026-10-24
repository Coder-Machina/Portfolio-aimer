<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // [WHY] Single administrator account for portfolio management via Filament panel
        User::query()->updateOrCreate(
            ['email' => 'aimeakd6@gmail.com'],
            [
                'name' => 'AKODO Aimé D. Yves',
                'password' => Hash::make('admin1234'),
                'email_verified_at' => now(),
            ]
        );
    }
}
