<?php

namespace Database\Seeders;

use App\Models\ExperienceUser;
use Illuminate\Database\Seeder;

class ExperienceUserSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        $count = 10;

        for ($i = 0; $i < $count; $i++) {
            $make = ExperienceUser::factory()->make();

            $existingCombination = ExperienceUser::where('user_id', $make->user_id)
                ->where('experience_id', $make->experience_id)
                ->exists();

            if (!$existingCombination) {
                ExperienceUser::create([
                    'user_id' => $make->user_id,
                    'duration' => $make->duration,
                    'experience_id' => $make->experience_id,
                ]);
            }
        }
    }
}
