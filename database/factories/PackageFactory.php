<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word . ' Package', // Unique name with a descriptor
            'price' => $this->faker->numberBetween(10000, 99999), // Random price between 10,000 and 99,999
            'status' => $this->faker->boolean ? 1 : 0, // Randomly set status to 0 or 1
            'number_love' => $this->faker->numberBetween(0, 10), // Random number of loves between 0 and 10
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
