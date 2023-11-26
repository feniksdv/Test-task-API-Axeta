<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        Profile::factory()->count(10)->create();
    }
}
