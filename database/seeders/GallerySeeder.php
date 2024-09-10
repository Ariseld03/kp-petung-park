<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        DB::table('galleries')->insert([
            [
                'name' => 'Sunset Over the Mountains',
                'photo_link' => 'https://example.com/images/sunset.jpg',
                'description' => $faker->sentence,
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Beautiful Beach',
                'photo_link' => 'https://example.com/images/beach.jpg',
                'description' => $faker->sentence,
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'City Lights',
                'photo_link' => 'https://example.com/images/city.jpg',
                'description' => $faker->sentence,
                'status' => 0,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Forest Path',
                'photo_link' => 'https://example.com/images/forest.jpg',
                'description' => $faker->sentence,
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mountain Peak',
                'photo_link' => 'https://example.com/images/mountain.jpg',
                'description' => $faker->sentence,
                'status' => 0,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
