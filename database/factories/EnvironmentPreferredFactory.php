<?php

namespace Database\Factories;

use App\Models\EnvironmentPreferred;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnvironmentPreferredFactory extends Factory
{
    /** @var string */
    protected $model = EnvironmentPreferred::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        $data = [
            'GitHub',
            'Mac OSX',
            'Linux',
            'Windows',
            'PHPStorm',
            'VS Code',
            'Notepad++',
            'Word',
            'Atom',
            'Postman',
        ];

        return [
            'value' => fake()->unique()->randomElement($data),
            'is_active' => true,
        ];
    }
}
