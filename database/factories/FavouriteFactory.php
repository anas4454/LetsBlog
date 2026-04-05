<?php

namespace Database\Factories;

use App\Models\Favourite;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Favourite>
 */
class FavouriteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'blogId' => $this->faker->numberBetween(1, 10),
            'userId' => $this->faker->numberBetween(1, 10),
        ];
    }
}
