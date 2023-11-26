<?php

namespace Database\Factories;

use App\Models\Portfolio;
use Illuminate\Database\Eloquent\Factories\Factory;

class PortfolioFactory extends Factory
{
    /** @var string */
    protected $model = Portfolio::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1, 10),
            'value' => fake()->sentence(
                7,
                true,
                'Fast and reliable Bootstrap widgets in Angular'
            ),
        ];
    }
}
