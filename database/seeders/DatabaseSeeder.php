<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@coffee.com',
            'password' => Hash::make('password123'),
        ]);

        // Run other seeders
        $this->call([
            MenuItemSeeder::class,
            EventSeeder::class,
        ]);
    }
}
