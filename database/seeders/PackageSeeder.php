<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        DB::table('packages')->insert([
            [
                'name' => 'Paket Hemat',
                'price' => $faker->randomFloat(2, 60000, 250000),
                'status' => 1,
                'number_love' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paket Rame-rame',
                'price' => $faker->randomFloat(2, 60000, 250000),
                'status' => 1,
                'number_love' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paket Ngedate',
                'price' => $faker->randomFloat(2, 60000, 250000),
                'status' => 1,
                'number_love' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paket Puas',
                'price' => $faker->randomFloat(2, 60000, 250000),
                'status' => 0,
                'number_love' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paket Panas',
                'price' => $faker->randomFloat(2, 60000, 250000),
                'status' => 1,
                'number_love' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
