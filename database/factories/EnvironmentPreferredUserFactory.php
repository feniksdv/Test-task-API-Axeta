<?php

namespace Database\Factories;

use App\Models\EnvironmentPreferred;
use App\Models\EnvironmentPreferredUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnvironmentPreferredUserFactory extends Factory
{
    /** @var string */
    protected $model = EnvironmentPreferredUser::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        $users = User::all();
        $environmentPreferred = EnvironmentPreferred::all();

        return [
            'user_id' => $users->random()->id,
            'environment_id' => $environmentPreferred->random()->id,
        ];
    }
}



