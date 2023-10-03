<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(1)->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$cjF6uX/ecymGhdxPX5/n2.VUVSctPIZOz4cCfjynOT6...',
            'remember_token' => Str::random(10),
            'role'=> "admin"
        ]);
        \App\Models\User::factory(1)->create([
            'name' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$cjF6uX/ecymGhdxPX5/n2.VUVSctPIZOz4cCfjynOT6...',
            'remember_token' => Str::random(10),
            'role'=> "superadmin"

        ]);
    }
}
