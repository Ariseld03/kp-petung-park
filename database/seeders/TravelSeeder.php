<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class TravelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        DB::table('travels')->insert([
            [
                'name' => 'Hutan Bambu',
                'description' => 'Perjalanan yang menakjubkan melalui Hutan Bambu, menawarkan keindahan alam yang memukau dan suasana yang tenang.',
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 20),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Camping Ground',
                'description' => 'Nikmati sensasi tinggal bersama dengan alam dan pemandangan yang menakjubkan sekaligus menenangkan.',
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 20),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Meja Kecek',
                'description' => 'Tempat yang cocok untuk bersantai, bermain air, dan menikmati pemandangan alami sembari makan dan minum.',
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 20),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kolam Bayi',
                'description' => 'Kolam renang aman dengan kedalaman rendah yang dirancang khusus untuk anak-anak.',
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 20),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pondok Bambu',
                'description' => 'Rasakan udara yang sangat sejuk dan suasana tenang di Pondok Bambu',
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 20),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pujasera',
                'description' => 'Menawarkan pengalaman kuliner yang menyenangkan, Pujasera adalah tempat berkumpul untuk menikmati berbagai hidangan lezat sambil bersantai di lingkungan yang nyaman.',
                'status' => 0,
                'number_love' => $faker->numberBetween(0, 20),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
