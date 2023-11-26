<?php

namespace Database\Factories;

use App\Models\Availability;
use Illuminate\Database\Eloquent\Factories\Factory;

class AvailabilityFactory extends Factory
{
    /** @var string */
    protected $model = Availability::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        $data = [
            'Full-time',
            'Part-time',
            'Contract',
            'Freelance',
            'Internship',
            'Remote',
            'Temporary',
            'Shift-based',
            'Seasonal',
            'Flex-time',
        ];

        return [
            'value' => fake()->unique()->randomElement($data),
            'is_active' => true,
        ];
    }
}
