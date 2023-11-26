<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        Experience::factory()->count(10)->create();
    }
}
