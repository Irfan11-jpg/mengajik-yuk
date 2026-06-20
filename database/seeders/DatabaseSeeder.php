<?php

namespace Database\Seeders;

use App\Models\User; // Pastikan baris ini ada
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Pastikan baris ini ada

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Ustadz Ahmad',
            'email' => 'guru@mengaji.com',
            'password' => Hash::make('password'),
            'role' => 'guru',
        ]);

        User::create([
            'name' => 'Santri Ali',
            'email' => 'santri@mengaji.com',
            'password' => Hash::make('password'),
            'role' => 'santri',
        ]);
    }
}