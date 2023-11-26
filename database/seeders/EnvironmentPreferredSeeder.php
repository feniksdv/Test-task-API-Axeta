<?php

namespace Database\Seeders;

use App\Models\EnvironmentPreferred;
use Illuminate\Database\Seeder;

class EnvironmentPreferredSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        EnvironmentPreferred::factory()->count(9)->create();
    }
}
