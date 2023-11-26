<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        Portfolio::factory()->count(10)->create();
    }
}
