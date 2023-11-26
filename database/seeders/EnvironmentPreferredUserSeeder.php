<?php

namespace Database\Seeders;

use App\Models\EnvironmentPreferredUser;
use Illuminate\Database\Seeder;

class EnvironmentPreferredUserSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        $count = 10;

        for ($i = 0; $i < $count; $i++) {
            $make = EnvironmentPreferredUser::factory()->make();

            $existingCombination = EnvironmentPreferredUser::where('user_id', $make->user_id)
                ->where('environment_id', $make->environment_id)
                ->exists();

            if (!$existingCombination) {
                EnvironmentPreferredUser::create([
                    'user_id' => $make->user_id,
                    'environment_id' => $make->environment_id,
                ]);
            }
        }
    }
}
