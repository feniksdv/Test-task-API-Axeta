<?php

namespace Database\Seeders;

use App\Models\AvailabilityUser;
use Illuminate\Database\Seeder;

class AvailabilityUserSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        $count = 10;

        for ($i = 0; $i < $count; $i++) {
            $make = AvailabilityUser::factory()->make();

            $existingCombination = AvailabilityUser::where('user_id', $make->user_id)
                ->where('availability_id', $make->availability_id)
                ->exists();

            if (!$existingCombination) {
                AvailabilityUser::create([
                    'user_id' => $make->user_id,
                    'availability_id' => $make->availability_id,
                ]);
            }
        }
    }
}
