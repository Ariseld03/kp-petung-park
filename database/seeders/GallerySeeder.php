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
                'name' => 'Rumah Makan Kecek Air',
                'photo_link' => 'https://example.com/images/sunset.jpg',
                'description' => $faker->sentence,
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pemandangan Sawah',
                'photo_link' => 'https://example.com/images/beach.jpg',
                'description' => $faker->sentence,
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gazebo',
                'photo_link' => 'https://example.com/images/city.jpg',
                'description' => $faker->sentence,
                'status' => 0,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sumber Air',
                'photo_link' => 'https://example.com/images/forest.jpg',
                'description' => $faker->sentence,
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hutan Bambu',
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
