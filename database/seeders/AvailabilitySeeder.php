<?php

namespace Database\Seeders;

use App\Models\Availability;
use Illuminate\Database\Seeder;

class AvailabilitySeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        Availability::factory()->count(10)->create();
    }
}
