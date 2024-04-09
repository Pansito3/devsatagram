<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->name(),
            'descripcion' => $this->faker->sentence(20),
            'imagen' => "0ff3a438-90ab-429d-9f1d-e75aeb97fc10.jpg",
            'user_id' => $this->faker->randomElement([1, 2, 3])
        ];
    }
}
