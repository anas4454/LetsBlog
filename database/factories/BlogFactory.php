<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'title'=> $this->faker->word(),
           'slug'=> $this->faker->word(),
           'image'=> "https://picsum.photos/seed/blog1/300/200",
           "writer_id"=>$this->faker->numberBetween( 0 , 5),
           "user_id"=>$this->faker->numberBetween( 0 , 5),
           'excerpt'=> $this->faker->word(),
           'description'=> $this->faker->paragraphs( 3 ,8)
        ];
    }
}
