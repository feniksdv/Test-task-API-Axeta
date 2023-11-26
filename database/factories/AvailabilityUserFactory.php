<?php

namespace Database\Factories;

use App\Models\Availability;
use App\Models\AvailabilityUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AvailabilityUserFactory extends Factory
{
    /** @var string */
    protected $model = AvailabilityUser::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        $users = User::all();
        $availabilities = Availability::all();

        return [
            'user_id' => $users->random()->id,
            'availability_id' => $availabilities->random()->id,
        ];
    }
}




