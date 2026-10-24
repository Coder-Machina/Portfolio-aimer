<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // [WHY] Administrator account initialized with the user's custom password
        $customHash = '$2y$12$5D8K207b/vpxEEg5UQGyDeLOMlaZP9/BjPYaC6HGyk1I97BAE8ByW';
        $adminPassword = env('ADMIN_PASSWORD');

        DB::table('users')->updateOrInsert(
            ['email' => 'aimeakd6@gmail.com'],
            [
                'name' => 'AKODO Aimé D. Yves',
                'password' => $adminPassword ? Hash::make($adminPassword) : $customHash,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
