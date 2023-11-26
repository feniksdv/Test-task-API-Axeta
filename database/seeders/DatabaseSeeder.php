<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ProfileSeeder::class,
            PortfolioSeeder::class,
            AvailabilitySeeder::class,
            AvailabilityUserSeeder::class,
            EnvironmentPreferredSeeder::class,
            EnvironmentPreferredUserSeeder::class,
            ExperienceSeeder::class,
            ExperienceUserSeeder::class,
        ]);
    }
}
