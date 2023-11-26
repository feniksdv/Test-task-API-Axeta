<?php

namespace Database\Factories;

use App\Models\Experience;
use App\Models\ExperienceUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExperienceUserFactory extends Factory
{
    /** @var string */
    protected $model = ExperienceUser::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        $users = User::all();
        $experience = Experience::all();

        return [
            'user_id' => $users->random()->id,
            'experience_id' => $experience->random()->id,
            'duration' => fake()->randomFloat(1, 0.1, 10.0),
        ];
    }
}
