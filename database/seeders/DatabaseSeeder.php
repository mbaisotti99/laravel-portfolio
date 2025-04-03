<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TypeSeeder::class,
            TechSeeder::class,
            DevsSeeder::class,
            DevsTechsSeeder::class,
            ProjectsSeeder::class,
            ProjectTechSeeder::class,
        ]);
    }
}
