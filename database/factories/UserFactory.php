<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /** @var string */
    protected $model = User::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->unique()->firstName(),
            'last_name' => fake()->unique()->lastName(),
            'is_active' => true,
        ];
    }
}
