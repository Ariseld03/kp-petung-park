<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word, // Generate a unique category name
            'status' => $this->faker->boolean ? 1 : 0, // Randomly set status to 0 or 1
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}