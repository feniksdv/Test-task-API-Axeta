<?php

namespace Database\Factories;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExperienceFactory extends Factory
{
    /** @var string */
    protected $model = Experience::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        $data = [
            'PHP',
            'Java Script',
            'Ruby',
            'C#',
            'C++',
            'HTML',
            'CSS',
            'RabbitMQ',
            'Python',
            '1C',
        ];

        return [
            'value' => fake()->unique()->randomElement($data),
            'is_active' => true,
        ];
    }
}
