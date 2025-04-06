<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Rafi',
            'email' => 'rafi@gmail.com',
            'password' => Hash::make('123'), // Mengenkripsi password
            'role' => 'user', // Atur role default
        ]);
    }
}
