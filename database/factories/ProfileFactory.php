<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;
use MatanYadaev\EloquentSpatial\Objects\Point;

class ProfileFactory extends Factory
{
    /** @var string */
    protected $model = Profile::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        $data = [
            'English',
            'Kannada',
            'Kinyarwanda',
            'Kyrgyz',
            'Chinese',
            'Korean',
            'Corsican',
            'Kurdish',
            'Laotian',
            'Latin',
        ];

        return [
            'user_id' => fake()->unique()->numberBetween(1, 10),
            'address' => fake()->city . ', ' . fake()->state . ', ' . fake()->country,
            'language' => fake()->unique()->randomElement($data),
            'sample_code' => "<div class='golden-grid'><div style='grid-area:11 / 1 / span 10 / span 12;'></div></div>",
            'amaizing' => fake()->sentence(
                10,
                true,
                'The only true wisdom is in knowing you know nothing...'
            ),
            'clients_look' => fake()->sentence(
                10,
                true,
                'There is only one good, knowledge, and one evil, ignorance.'
            ),
            'location' => new Point(
                fake()->randomFloat(6, -90, 90),
                fake()->randomFloat(6, -180, 180)
            ),
        ];
    }
}
